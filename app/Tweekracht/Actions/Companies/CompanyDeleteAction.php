<?php

declare(strict_types=1);

namespace App\Tweekracht\Actions\Companies;

use App\Models\Company;

final class CompanyDeleteAction
{
    public function __invoke(Company $company): bool
    {
        return $company->delete();
    }
}
