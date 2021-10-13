<?php

declare(strict_types=1);

namespace App\Models;

use App\Tweekracht\Helpers\PowerColorHelper;
use Illuminate\Database\Eloquent\Model;

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
    public function getDisplayNameAttribute(): string
    {
        return $this->type . ': ' . $this->power;
    }

    public function getColorAttribute(): string
    {
        return resolve(PowerColorHelper::class)->getColorByType($this->type);
    }
}
