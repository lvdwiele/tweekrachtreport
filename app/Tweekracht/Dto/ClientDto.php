<?php

declare(strict_types=1);

namespace App\Tweekracht\Dto;


use App\Models\CorePower;
use Illuminate\Database\Eloquent\Collection;

final class ClientDto
{
    public Collection $core_powers;

    public function __construct(
        int $core_power_1,
        int $core_power_2,
        public string $first_name,
        public string $last_name,
        public string $email,
        public ?int $company_id = null,
        public ?string $address = null,
        public ?string $zip_code = null,
        public ?string $place = null,
        public ?string $phone_number = null,
    )
    {
        $this->core_powers = Collection::make([
            CorePower::query()->find($core_power_1),
            CorePower::query()->find($core_power_2)
        ]);
    }
}
