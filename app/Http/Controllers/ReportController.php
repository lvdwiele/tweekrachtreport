<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ReportStoreRequest;
use App\Models\Client;
use App\Models\Report;
use App\Models\User;
use App\Tweekracht\Actions\Reports\ReportCreateAction;
use App\Tweekracht\Actions\Reports\ReportDeleteAction;
use App\Tweekracht\Dto\ReportDto;
use App\Tweekracht\Helpers\PowerHelper;
use App\Tweekracht\Html\Alert;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Contracts\View\View;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\Factory;

final class ReportController extends Controller
{
    public function __construct(Factory $view, Redirector $redirector, protected PowerHelper $powerHelper)
    {
        parent::__construct($view, $redirector);
    }

    public function index(Request $request): View
    {
        $filter = $request->query('filter');

        /** @var User $user */
        $user = $request->user();

        $reports = Report::findByUserType($user)
            ->join('clients', 'clients.id', '=', 'reports.client_id')
            ->with([
                'client',
                'client.corePowers',
                'client.supportPowers',
            ])
            ->select('reports.*');

        if (!empty($filter)) {
            $reports = $reports
                ->Where('clients.first_name', 'like', '%' . $filter . '%')
                ->orWhere('clients.last_name', 'like', '%' . $filter . '%')
                ->orWhereHas('client.corePowers', function ($query) use ($filter) {
                    return $query->where('core_powers.power', 'like', '%' . $filter . '%');
                })
                ->orWhereHas('client.supportPowers', function ($query) use ($filter) {
                    return $query->where('support_powers.power', 'like', '%' . $filter . '%');
                });
        }

        $reports = $reports->paginate(15)
            ->appends(['filter' => $filter]);

        return $this->view->make('report.index', compact('reports', 'filter'));
    }

    public function show(Report $report): View
    {
        $firstCorePower = $report->client->corePowers->first();
        $secondCorePower = $report->client->corePowers->last();

        $firstSupportPower = null;
        $secondSupportPower = null;

        if (isset($report->client->supportPowers)) {
            $firstSupportPower = $report->client->supportPowers->first();
            $secondSupportPower = $report->client->supportPowers->last();
        }

        return $this->view->make(
            'report.show',
            compact(
                'report',
                'firstCorePower',
                'secondCorePower',
                'firstSupportPower',
                'secondSupportPower'
            )
        );
    }

    public function create(Request $request, Client $client): RedirectResponse|View
    {
        $firstSupportPowers = $this->powerHelper->getFirstSupportPowers(
            $client->corePowers->first(), $client->corePowers->last()
        );

        $secondSupportPowers = $this->powerHelper->getSecondSupportPowers(
            $client->corePowers->first(), $client->corePowers->last()
        );

        if ($firstSupportPowers->count() === 0 || $secondSupportPowers->count() === 0) {
            return $this->redirector->back()
                ->with(Alert::DANGER, __('error.powers.no_support_powers_possible'));
        }

        if ($this->powerHelper->isUnicorn($firstSupportPowers->first(), $secondSupportPowers->first())) {
            return $this->redirector->back()
                ->with(Alert::DANGER, __('report.create.messages.unicorn'));
        }

        /** @var User $user */
        $user = $request->user();

        if ($user->support_calculation > 60000) {
            return $this->redirector->back()
                ->with(Alert::DANGER, __('report.create.messages.max_calculations'));
        }

        $user->support_calculation += 1;
        $user->save();

        return $this->view->make('report.create', compact('client', 'firstSupportPowers', 'secondSupportPowers'));
    }

    public function store(
        ReportStoreRequest $request,
        Client             $client,
        ReportCreateAction $reportCreateAction
    ): RedirectResponse
    {
        $reportDto = new ReportDto(...$request->validated());

        $report = ($reportCreateAction)($client, $reportDto);

        return $this->redirector->route('reports.show', [$report->id]);
    }

    public function destroy(Report $report, ReportDeleteAction $reportDeleteAction): RedirectResponse
    {
        $result = ($reportDeleteAction)($report);

        if (!$result) {
            return $this->redirector->back()
                ->with(Alert::DANGER, __('report.delete.messages.fail'));
        }

        return $this->redirector->route('reports')
            ->with(Alert::SUCCESS, __('report.delete.messages.success'));
    }

    public function download(Report $report, FilesystemManager $fileSystem): Response
    {
        try {
            return new Response(
                $fileSystem->disk('reports')
                    ->get($report->client->report_file_name),
                200,
                [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => sprintf(
                        'attachment; filename="%s.pdf"',
                        __('report.download.filename', ['name' => $report->client->full_name])
                    ),
                ]
            );
        } catch (FileNotFoundException $exception) {
            return new Response('', 404);
        }
    }
}
