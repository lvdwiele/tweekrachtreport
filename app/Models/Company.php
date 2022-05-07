<?php

declare(strict_types=1);

namespace App\Models;

use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Company
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $zip_code
 * @property string $place
 * @property string $email
 * @property string $phone_number
 * @property mixed $created_at
 * @property mixed $updated_at
 *
 * @property User $user
 */
final class Company extends Model
{
    /**
     * @var string[]
     */
    protected $hidden = [
        'user_id',
    ];

    protected $fillable = [
        'name',
        'address',
        'zip_code',
        'place',
        'email',
        'phone_number',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    public static function findByAuthenticatedUser(): Builder
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->role_id === Role::ROLE_ADMIN) {
            return self::query();
        }

        return $user->companies()
            ->getQuery();
    }

    public static function findByUser(User $user): Builder
    {
        if ($user->role_id === Role::ROLE_ADMIN) {
            return self::query();
        }

        return self::query()
            ->where(['user_id' => $user->id]);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }

    public function getFormattedCreatedAtAttribute(): string
    {
        return $this->created_at->toFormattedDateString();
    }
}
