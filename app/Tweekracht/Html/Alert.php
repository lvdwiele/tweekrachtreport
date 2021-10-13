<?php

declare(strict_types=1);

namespace App\Tweekracht\Html;

use App\Tweekracht\Exceptions\PowerTypeNotSupported;

/**
 * Class Alert
 * @package App\Tweekracht\Html
 */
class Alert
{
    public const PRIMARY = 'primary';
    public const SECONDARY = 'secondary';
    public const SUCCESS = 'success';
    public const DANGER = 'danger';
    public const WARNING = 'warning';
    public const LIGHT = 'light';
    public const DARK = 'dark';

    /**
     * Get a list of all supported alert types.
     *
     * @return string[]
     */
    public static function types()
    {
        return [
            self::PRIMARY,
            self::SECONDARY,
            self::SUCCESS,
            self::DANGER,
            self::WARNING,
            self::LIGHT,
            self::DARK
        ];
    }

    public static function getTitle(string $type)
    {
        switch ($type) {
            case self::SUCCESS:
                return __('alert.success');
            case self::DANGER:
                return __('alert.danger');
            case self::WARNING:
                return __('alert.warning');
            default:
                throw new \InvalidArgumentException("Specified alert type: $type not found!");
        }
    }
}
