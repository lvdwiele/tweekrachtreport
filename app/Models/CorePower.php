<?php

declare(strict_types=1);

namespace App\Models;

use App\Tweekracht\Helpers\PowerColorHelper;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CorePower
 * @package App\Models
 *
 * @property int $id
 * @property string $type
 * @property string $card_number
 * @property string $power
 * @property string $description
 */
final class CorePower extends Model
{
    public function getDisplayNameAttribute(): string
    {
        return $this->type . ': ' . $this->power . ', ' . '( kaart: ' . $this->card_number . ' )';
    }

    public function getColorAttribute(): string
    {
        return resolve(PowerColorHelper::class)->getColorByType($this->type);
    }
}
