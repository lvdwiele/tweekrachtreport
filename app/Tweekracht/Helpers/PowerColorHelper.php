<?php

declare(strict_types=1);

namespace App\Tweekracht\Helpers;

use App\Tweekracht\Dto\Objects\Power\SupportPower;
use App\Tweekracht\Exceptions\PowerTypeNotSupported;

/**
 * Class PowerColorHelper
 * @package App\Tweekracht\Helpers
 */
class PowerColorHelper
{
    public const TYPE_DREAMING = 'Dromen';
    public const TYPE_SHARING = 'Delen';
    public const TYPE_DOING = 'Doen';
    public const TYPE_DARING = 'Durven';

    /**
     * @param string $type
     * @return string
     * @throws PowerTypeNotSupported
     */
    public function getColorByType(string $type): string
    {
        if (!array_key_exists($type, $this->getColors())) {
            throw new PowerTypeNotSupported("The given power type: '$type' is not supported.");
        }

        return $this->getColors()[$type];
    }

    /**
     * @return string[]
     */
    public function getColors(): array
    {
        return [
            self::TYPE_DREAMING => '#fbba1b',
            self::TYPE_SHARING => '#007949',
            self::TYPE_DOING => '#3161aa',
            self::TYPE_DARING => '#e41a16'
        ];
    }
}
