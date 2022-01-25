<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Filesystem\FilesystemManager;

/**
 * Class Report
 * @package App\Models
 *
 * @property int $id
 * @property Client $client
 * @property User $user
 *
 * @property int $file_status
 * @property string $file_status_text
 * @property string $file_status_class
 *
 * @property mixed $created_at
 */
final class Report extends Model
{
    public static int $FILE_STATUS_NOT_FOUND = 0;
    public static int $FILE_STATUS_IN_THE_MAKE = 1;
    public static int $FILE_STATUS_AVAILABLE = 2;
    public static int $FILE_STATUS_ERROR = 3;

    protected $fillable = [
        'user_id',
        'file_status',
    ];

    /**
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function findByUserType(User $user): Builder
    {
        if ($user->role_id === Role::ROLE_ADMIN) {
            return self::query();
        }

        return self::query()
            ->where('reports.user_id', $user->id);
    }

    public function getFormattedCreatedAtAttribute(): string
    {
        return $this->created_at->toFormattedDateString();
    }

    public function fileInSystem(): bool
    {
        /** @var FilesystemManager $filesystem */
        $filesystem = resolve(FilesystemManager::class);

        return $filesystem->disk('reports')
            ->has($this->client->report_file_name);
    }

    public function getFileStatusTextAttribute(): string
    {
        return match ($this->file_status) {
            self::$FILE_STATUS_NOT_FOUND => __('report.status.not_found'),
            self::$FILE_STATUS_IN_THE_MAKE => __('report.status.in_the_make'),
            self::$FILE_STATUS_AVAILABLE => __('report.status.available'),
            self::$FILE_STATUS_ERROR => __('report.status.error'),
        };
    }

    public function getFileStatusClassAttribute(): string
    {
        return match ($this->file_status) {
            self::$FILE_STATUS_NOT_FOUND, self::$FILE_STATUS_ERROR => 'text-danger',
            self::$FILE_STATUS_IN_THE_MAKE => 'text-warning',
            self::$FILE_STATUS_AVAILABLE => 'text-success',
        };
    }
}
