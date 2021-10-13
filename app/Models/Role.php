<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 */
final class Role extends Model
{
    public const ROLE_ADMIN = 1;
    public const ROLE_COACH = 2;

    /**
     * @var bool
     */
    public $timestamps = false;
}
