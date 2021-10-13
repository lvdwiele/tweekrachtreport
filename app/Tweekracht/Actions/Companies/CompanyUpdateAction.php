<?php

declare(strict_types=1);

namespace App\Tweekracht\Actions\Companies;

use App\Models\Company;
use App\Tweekracht\Dto\CompanyDto;

final class CompanyUpdateAction
{
    public function __invoke(Company $company, CompanyDto $companyDto): Company
    {
        $company->update([
            'name' => $companyDto->name,
            'email' => $companyDto->email,
            'address' => $companyDto->address,
            'zip_code' => $companyDto->zip_code,
            'place' => $companyDto->place,
            'phone_number' => $companyDto->phone_number,
        ]);

        return $company;
    }
}
