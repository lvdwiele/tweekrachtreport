<?php

declare(strict_types=1);

namespace App\Tweekracht\Dto;

use App\Models\SupportPower;
use Illuminate\Database\Eloquent\Collection;

final class ReportDto
{
    public Collection $support_powers;

    public function __construct(
        int $first_support_power,
        int $second_support_power,
    )
    {
        $this->support_powers = Collection::make([
            SupportPower::find($first_support_power),
            SupportPower::find($second_support_power)
        ]);
    }
}
