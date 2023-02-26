<?php

declare(strict_types=1);

namespace App\Models;

use App\Tweekracht\Helpers\PowerColorHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class SupportPower extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'type',
        'power',
        'description',
        'card_number',
    ];

    protected $casts = [
        'card_number' => 'float',
    ];

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
