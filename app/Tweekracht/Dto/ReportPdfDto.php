<?php

declare(strict_types=1);

namespace App\Tweekracht\Dto;

use App\Models\Client;
use App\Models\CorePower;
use App\Models\SupportPower;
use App\Tweekracht\Helpers\PowerColorHelper;
use App\Tweekracht\Helpers\PowerHelper;

final class ReportPdfDto
{
    protected string $firstEndText;
    protected string $lastEndText;

    public function __construct(
        public PowerHelper $powerHelper,
        public PowerColorHelper $powerColorHelper,
        public Client $client,
        public CorePower $firstCorePower,
        public CorePower $secondCorePower,
        public SupportPower $firstSupportPower,
        public SupportPower $secondSupportPower,
    )
    {
    }

    public function getUpperColor(): string
    {
        return $this->powerHelper->getUpperAndBottomValues(
            $this->firstSupportPower,
            $this->secondSupportPower
        )['upperColor'];
    }

    public function getBottomColor(): string
    {
        return $this->powerHelper->getUpperAndBottomValues(
            $this->firstSupportPower,
            $this->secondSupportPower
        )['bottomColor'];
    }

    public function getUpperPower(): string
    {
        return $this->powerHelper->getUpperAndBottomValues(
            $this->firstSupportPower,
            $this->secondSupportPower
        )['upperPower'];
    }

    public function getBottomPower(): string
    {
        return $this->powerHelper->getUpperAndBottomValues(
            $this->firstSupportPower,
            $this->secondSupportPower
        )['bottomPower'];
    }

    public function getFirstEndText(): string
    {
        $splitName = explode('>', $this->firstSupportPower->description);
        return trim($splitName[1], '</b');
    }

    public function getLastEndText(): string
    {
        $splitName = explode('>', $this->secondSupportPower->description);
        return trim($splitName[1], '</b');
    }
}
