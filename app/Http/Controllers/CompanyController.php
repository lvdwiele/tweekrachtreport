<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use App\Models\Company as CompanyModel;
use App\Tweekracht\Actions\Companies\CompanyCreateAction;
use App\Tweekracht\Actions\Companies\CompanyDeleteAction;
use App\Tweekracht\Actions\Companies\CompanyUpdateAction;
use App\Tweekracht\Dto\CompanyDto;
use App\Tweekracht\Html\Alert;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class CompanyController extends Controller
{
    public function index(Request $request): View
    {
        $filter = $request->query('filter');

        $companies = CompanyModel::findByAuthenticatedUser()
            ->with(['user', 'clients']);

        if (!empty($filter)) {
            $companies = $companies
                ->where('companies.name', 'like', '%' . $filter . '%')
                ->orWhere('companies.address', 'like', '%' . $filter . '%')
                ->orWhere('companies.zip_code', 'like', '%' . $filter . '%')
                ->orWhere('companies.place', 'like', '%' . $filter . '%')
                ->orWhere('companies.email', 'like', '%' . $filter . '%')
                ->orWhere('companies.phone_number', 'like', '%' . $filter . '%');
        }

        $companies = $companies->paginate(15)
            ->appends(['filter' => $filter]);

        return $this->view->make('company.index', compact('companies', 'filter'));
    }

    public function create(): View
    {
        return $this->view->make('company.create');
    }

    public function show(Company $company): View
    {
        return $this->view->make('company.show', compact('company'));
    }

    public function store(CompanyStoreRequest $request, CompanyCreateAction $companyCreateAction): RedirectResponse
    {
        $companyDto = new CompanyDto(...$request->validated());

        $company = ($companyCreateAction)($request->user(), $companyDto);

        return $this->redirector->route('companies.show', [$company->id])
            ->with(Alert::SUCCESS, __('company.create.messages.success', ['Company', $company->name]));
    }

    public function update(
        CompanyUpdateRequest $request,
        Company              $company,
        CompanyUpdateAction  $companyUpdateAction
    ): RedirectResponse
    {
        $companyDto = new CompanyDto(...$request->validated());

        $company = ($companyUpdateAction)($company, $companyDto);

        return $this->redirector->route('companies.show', [$company->id])
            ->with(Alert::SUCCESS, __('company.update.messages.success', ['Company' => $company->name]));
    }

    public function destroy(Company $company, CompanyDeleteAction $companyDeleteAction): RedirectResponse
    {
        $result = ($companyDeleteAction)($company);

        if (!$result) {
            return $this->redirector->back()
                ->with(Alert::DANGER, __('company.delete.messages.fail', ['Company' => $company->name]));
        }

        return $this->redirector->route('companies')
            ->with(Alert::SUCCESS, __('company.delete.messages.success'));
    }
}
