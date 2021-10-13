<?php

declare(strict_types=1);

namespace App\Tweekracht\Dto;

final class CompanyDto
{
    public function __construct(
        public string $name,
        public string $email,
        public ?string $address = null,
        public ?string $place = null,
        public ?string $zip_code = null,
        public ?string $phone_number = null,
    )
    {
    }
}
