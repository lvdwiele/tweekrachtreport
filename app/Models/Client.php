<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

/**
 * Class Client
 * @package App\Models
 *
 * @property int $id
 * @property User $user
 * @property Company $company
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property string $zip_code
 * @property string $place
 * @property string $phone_number
 * @property mixed $updated_at
 * @property mixed $created_at
 *
 * @property string $full_name
 * @property string $report_file_name
 * @property string $report_file_path
 *
 * @property Collection $corePowers
 * @property Collection $supportPowers
 * @property Report $report
 */
final class Client extends Model
{
    protected $hidden = [
        'user_id',
        'company_id',
    ];

    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'address',
        'zip_code',
        'place',
        'phone_number',
        'company_id',
    ];

    protected $casts = [
        'updated_at' => 'timestamp',
        'created_at' => 'timestamp',
    ];

    /*
     * Relations
     */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function corePowers(): BelongsToMany
    {
        return $this->belongsToMany(CorePower::class, 'client_core_powers');
    }

    public function supportPowers(): BelongsToMany
    {
        return $this->belongsToMany(SupportPower::class, 'client_support_powers');
    }

    public function report(): HasOne
    {
        return $this->hasOne(Report::class);
    }

    /*
     * Functions
     */

    public static function findByUserType(User $user): Builder
    {
        if ($user->role_id === Role::ROLE_ADMIN) {
            return self::query();
        }

        return self::query()
            ->where('user_id', $user->id);
    }

    /*
     * Mutators
     */

    public function getFullNameAttribute(): string
    {
        return ucwords($this->first_name . ' ' . $this->last_name);
    }

    public function getReportFileNameAttribute(): string
    {
        return 'report_' . $this->id . '.pdf';
    }

    public function getFormattedCreatedAtAttribute(): string
    {
        return $this->created_at->toFormattedDateString();
    }
}
