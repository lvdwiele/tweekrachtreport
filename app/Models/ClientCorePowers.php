<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class ClientCorePowers
 * @package App\Models
 *
 * @property Client $client
 * @property CorePower $corePower
 */
final class ClientCorePowers extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'client_id',
        'core_power_id'
    ];

    /**
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * @return HasOne
     */
    public function corePower(): HasOne
    {
        return $this->hasOne(CorePower::class);
    }
}
