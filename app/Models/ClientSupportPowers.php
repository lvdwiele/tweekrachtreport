<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class ClientSupportPowers
 * @package App\Models
 *
 * @property Client $client
 * @property SupportPower $supportPower
 */
final class ClientSupportPowers extends Model
{
    /**
     * @var array
     */
    protected $hidden = [
        'id'
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'client_id',
        'support_power_id'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

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
    public function supportPower(): HasOne
    {
        return $this->hasOne(SupportPower::class);
    }
}
