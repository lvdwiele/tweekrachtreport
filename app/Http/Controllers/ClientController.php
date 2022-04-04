<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Models\Client;
use App\Models\Company;
use App\Models\CorePower;
use App\Tweekracht\Actions\Clients\ClientCreateAction;
use App\Tweekracht\Actions\Clients\ClientDeleteAction;
use App\Tweekracht\Actions\Clients\ClientUpdateAction;
use App\Tweekracht\Dto\ClientDto;
use App\Tweekracht\Html\Alert;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class ClientController extends Controller
{
    public function index(Request $request): View
    {
        $filter = $request->query('filter');

        $clients = Client::findByUserType($request->user())
            ->with([
                'user',
                'company',
                'corePowers',
                'report',
            ]);

        if (!empty($filter)) {
            $clients = $clients
                ->where(function (Builder $query) use ($filter) {
                    $query->whereHas('corePowers', function ($query) use ($filter) {
                        $query->where('core_powers.power', 'like', '%' . $filter . '%');
                    })
                        ->orWhere('clients.first_name', 'like', '%' . $filter . '%')
                        ->orWhere('clients.last_name', 'like', '%' . $filter . '%');
                });
        }

        $clients = $clients->paginate(15)
            ->appends(['filter' => $filter]);

        return $this->view->make('client.index', compact('clients', 'filter'));
    }

    public function create(Request $request): View
    {
        $companies = Company::findByUser($request->user())
            ->get();
        $corePowers = CorePower::all();

        return view('client.create', compact('companies', 'corePowers'));
    }

    public function store(ClientStoreRequest $request, ClientCreateAction $clientCreateAction): RedirectResponse
    {
        $clientDto = new ClientDto(...$request->validated());

        $client = ($clientCreateAction)($request->user(), $clientDto);

        return $this->redirector->route('clients.show', $client)
            ->with(Alert::SUCCESS, __('client.create.messages.success', ['Client' => $client->full_name]));
    }

    public function show(Client $client, Request $request): View
    {
        $companies = Company::findByUser($request->user())
            ->get();
        $corePowers = CorePower::all();
        [
            $firstCorePower,
            $secondCorePower,
        ] = $client->corePowers;

        return $this->view->make(
            'client.show',
            compact('client', 'firstCorePower', 'secondCorePower', 'companies', 'corePowers')
        );
    }

    public function update(
        ClientUpdateRequest $request,
        Client              $client,
        ClientUpdateAction  $clientUpdateAction
    ): RedirectResponse
    {
        $clientDto = new ClientDto(...$request->validated());

        $client = ($clientUpdateAction)($client, $clientDto);

        return $this->redirector->route('clients.show', [$client->id])
            ->with(Alert::SUCCESS, __('client.update.messages.success', ['Client' => $client->full_name]));
    }

    public function destroy(
        Client             $client,
        ClientDeleteAction $clientDeleteAction
    ): RedirectResponse
    {
        $result = ($clientDeleteAction)($client);

        if (!$result) {
            return $this->redirector->back()
                ->with(Alert::DANGER, __('client.delete.messages.fail', ['Client' => $client->full_name]));
        }

        return $this->redirector->route('clients')
            ->with(Alert::SUCCESS, __('client.delete.messages.success'));
    }
}
