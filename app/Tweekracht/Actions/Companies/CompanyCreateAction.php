<?php

declare(strict_types=1);

namespace App\Tweekracht\Actions\Companies;

use App\Models\Company;
use App\Models\User;
use App\Tweekracht\Dto\CompanyDto;
use Illuminate\Database\Eloquent\Model;

final class CompanyCreateAction
{
    public function __invoke(User $user, CompanyDto $companyDto): Model|Company
    {
        return $user->companies()->create([
            'name' => $companyDto->name,
            'email' => $companyDto->email,
            'address' => $companyDto->address,
            'zip_code' => $companyDto->zip_code,
            'place' => $companyDto->place,
            'phone_number' => $companyDto->phone_number,
        ]);
    }
}
