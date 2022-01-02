<?php

declare(strict_types=1);

namespace App\Models;

use App\Mail\UserVerificationMail;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App\Models
 *
 * @property int $id
 * @property int $role_id
 * @property string $name
 * @property string $email
 * @property string $phone_number
 * @property string $password
 * @property float $rate
 * @property int $support_calculation
 * @property mixed $created_at
 * @property mixed $updated_at
 *
 * @property Role $role
 * @property Collection $companies
 * @property Collection $clients
 * @property Collection $reports
 */
final class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasFactory;

    public const RATE_100 = 100.00;
    public const RATE_50 = 50.00;
    public const RATE_0 = 0.00;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
        'phone_number',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'role_id',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'updated_at' => 'timestamp',
        'created_at' => 'timestamp',
    ];

    /**
     * @return BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->BelongsTo(Role::class);
    }

    /**
     * @return HasMany
     */
    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }

    /**
     * @return HasMany
     */
    public function companies(): HasMany
    {
        return $this->hasMany(Company::class);
    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }

    /**
     * @return int
     */
    public function getReportsCount(): int
    {
        $returned = 0;
        $clients = $this->clients()
            ->with('report')
            ->get();

        foreach ($clients as $client) {
            if ($client->report !== null) {
                $returned++;
            }
        }

        return $returned;
    }

    /**
     * Send the email verification mail.
     *
     * @return void
     */
    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new UserVerificationMail());
    }

    /**
     * Check if an user has the admin role.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role_id === Role::ROLE_ADMIN;
    }

    public function getReportsCountAttribute(): int
    {
        return $this->clients()
            ->with([
                'report' => function (Builder $query) {
                    $query->where('report.id', '!=', null);
                },
            ])
            ->count();
    }

    public function getReportsCountFromThisMonthAttribute(): int
    {
        $currentMonth = Carbon::now()
            ->month;
        $currentYear = Carbon::now()
            ->year;

        return $this->reports()
            ->whereYear('created_at', '=', $currentYear)
            ->whereMonth('created_at', '=', $currentMonth)
            ->count();
    }

    public function getReportsCountFromPreviousMonthAttribute(): int
    {
        $currentMonth = Carbon::now()
            ->subMonth()
            ->month;
        $currentYear = Carbon::now()
            ->year;

        return $this->reports()
            ->whereYear('created_at', '=', $currentYear)
            ->whereMonth('created_at', '=', $currentMonth)
            ->count();
    }

    public function getReportsCountFromTwoMonthsAgoAttribute(): int
    {
        $currentMonth = Carbon::now()
            ->subMonths(2)
            ->month;
        $currentYear = Carbon::now()
            ->year;

        return $this->reports()
            ->whereYear('created_at', '=', $currentYear)
            ->whereMonth('created_at', '=', $currentMonth)
            ->count();
    }

    public function getFormattedCreatedAtAttribute(): string
    {
        return Carbon::createFromTimestamp($this->created_at)
            ->toFormattedDateString();
    }
}
