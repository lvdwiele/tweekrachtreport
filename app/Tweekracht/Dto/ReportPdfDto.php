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
    public CorePower $firstCorePower;
    public CorePower $secondCorePower;
    public SupportPower $firstSupportPower;
    public SupportPower $secondSupportPower;

    public function __construct(
        public PowerHelper      $powerHelper,
        public PowerColorHelper $powerColorHelper,
        public Client           $client,
    )
    {
        $this->firstCorePower = $this->client->corePowers->first();
        $this->secondCorePower = $this->client->corePowers->last();

        // The first support power is determined as follows:
        // Determine what the 'shortest' distance between the core powers on the card circle
        // The first support power is in between these cards
        // There are 35 cards. So if the 'inside' distance is 16 or lower. Then that distance is the shortest.
        $shortestDistance = (int)$this->secondCorePower->card_number - (int)$this->firstCorePower->card_number <= 16
            ? 'inside'
            : 'outside';

        if ($shortestDistance === 'inside') {
            $shortestDistancePowers = $this->client->supportPowers
                ->filter(
                    fn(SupportPower $supportPower) => $supportPower->card_number > (int)$this->firstCorePower->card_number
                        && $supportPower->card_number < (int)$this->secondCorePower->card_number
                );
        } else {
            $shortestDistancePowers = $this->client->supportPowers
                ->filter(
                    fn(SupportPower $supportPower) => $supportPower->card_number < (int)$this->firstCorePower->card_number
                        || $supportPower->card_number > (int)$this->secondCorePower->card_number
                );
        }

        // in some cases the support powers do not have a card number yet. Then the $shortestDistancePowers is empty.
        // Use a temp fallback in that case.
        $this->firstSupportPower = $shortestDistancePowers->first() ?? $this->client->supportPowers->first();

        $otherSupportPower = $this->client->supportPowers
            ->filter(fn(SupportPower $supportPower) => $supportPower->id !== $this->firstSupportPower->id)
            ->first();

        if (!$otherSupportPower) {
            throw new \Exception('Cannot determine second support power for client: ' . $this->client->id);
        }

        $this->secondSupportPower = $otherSupportPower;
    }

    public function getUpperColor(): string
    {
        return $this->powerHelper->getUpperAndBottomValues(
            $this->firstSupportPower,
            $this->secondSupportPower,
        )['upperColor'];
    }

    public function getBottomColor(): string
    {
        return $this->powerHelper->getUpperAndBottomValues(
            $this->firstSupportPower,
            $this->secondSupportPower,
        )['bottomColor'];
    }

    public function getUpperPower(): string
    {
        return $this->powerHelper->getUpperAndBottomValues(
            $this->firstSupportPower,
            $this->secondSupportPower,
        )['upperPower'];
    }

    public function getBottomPower(): string
    {
        return $this->powerHelper->getUpperAndBottomValues(
            $this->firstSupportPower,
            $this->secondSupportPower,
        )['bottomPower'];
    }
}
