<?php

declare(strict_types=1);

namespace App\Models;

use App\Tweekracht\Helpers\PowerColorHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class SupportPower
 * @package App\Models
 *
 * @property int $id
 * @property string $type
 * @property string $power
 * @property string $description
 *
 * @property string $color
 */
final class SupportPower extends Model
{
    public function getColorAttribute(): string
    {
        return resolve(PowerColorHelper::class)->getColorByType($this->type);
    }

    public function firstSupportPowerCombinations(): HasMany
    {
        return $this->hasMany(Combination::class, 'first_support_power_id');
    }

    public function secondSupportPowerCombinations(): HasMany
    {
        return $this->hasMany(Combination::class, 'second_support_power_id');
    }

    public function firstSupportPower2Combinations(): HasMany
    {
        return $this->hasMany(Combination::class, 'first_support_power_id_2');
    }

    public function secondSupportPower2Combinations(): HasMany
    {
        return $this->hasMany(Combination::class, 'second_support_power_id_2');
    }
}
