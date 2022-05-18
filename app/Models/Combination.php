<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Combination extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'first_core_power_id',
        'second_core_power_id',
        'first_support_power_id',
        'second_support_power_id',
        'first_support_power_id_2',
        'second_support_power_id_2',
    ];

    public function firstCorePower(): BelongsTo
    {
        return $this->belongsTo(CorePower::class, 'first_core_power_id');
    }

    public function secondCorePower(): BelongsTo
    {
        return $this->belongsTo(CorePower::class, 'second_core_power_id');
    }

    public function firstSupportPower(): BelongsTo
    {
        return $this->belongsTo(CorePower::class, 'first_support_power_id');
    }

    public function secondSupportPower(): BelongsTo
    {
        return $this->belongsTo(CorePower::class, 'second_support_power_id');
    }

    public function firstSupportPower2(): BelongsTo
    {
        return $this->belongsTo(CorePower::class, 'first_support_power_id_2');
    }

    public function secondSupportPower2(): BelongsTo
    {
        return $this->belongsTo(CorePower::class, 'second_support_power_id_2');
    }
}
