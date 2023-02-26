<?php

declare(strict_types=1);

namespace App\Models;

use App\Tweekracht\Helpers\PowerColorHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class CorePower extends Model
{
    public function getColorAttribute(): string
    {
        return resolve(PowerColorHelper::class)->getColorByType($this->type);
    }

    public function firstCorePowerCombinations(): HasMany
    {
        return $this->hasMany(Combination::class, 'first_core_power_id');
    }

    public function secondCorePowerCombinations(): HasMany
    {
        return $this->hasMany(Combination::class, 'second_core_power_id');
    }
}
