<?php

declare(strict_types=1);

namespace App\Tweekracht\Helpers;

use App\Models\Combination;
use App\Models\CorePower;
use App\Models\SupportPower;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PowerHelper
 * @package App\Tweekracht\Helpers
 */
class PowerHelper
{
    private function getCorePowersSupportPowers(CorePower $firstCorePower, CorePower $secondCorePower): ?Combination
    {
        $combination = Combination::where('first_core_power_id', $firstCorePower->id)
            ->where('second_core_power_id', $secondCorePower->id)
            ->first();

        /**
         * If the combination does not exist. It's okay to look for 'other' combination which
         * use the same power (but have a different card number). These result in the same combinations.
         */
        if (!$combination) {
            $firstCorePowerReplacement = CorePower::where('power', $firstCorePower->power)
                ->where('id', '<>', $firstCorePower->id)
                ->first();
            $secondCorePowerReplacement = CorePower::where('power', $secondCorePower->power)
                ->where('id', '<>', $secondCorePower->id)
                ->first();
            $combination = Combination::where('first_core_power_id', $firstCorePowerReplacement?->id ?? $secondCorePower->id)
                ->where('second_core_power_id', $secondCorePowerReplacement?->id ?? $secondCorePower->id)
                ->first();
        }

        return $combination;
    }

    /**
     * Get the first support powers option(s).
     *
     * @param CorePower $firstCorePower
     * @param CorePower $secondCorePower
     * @return Collection
     */
    public function getFirstSupportPowers(CorePower $firstCorePower, CorePower $secondCorePower): Collection
    {
        $combination = $this->getCorePowersSupportPowers($firstCorePower, $secondCorePower);
        $collection = new Collection();

        if ($combination === null) {
            return $collection;
        }

        $collection->push(SupportPower::find($combination->first_support_power_id));

        if ($combination->second_support_power_id !== null) {
            $collection->push(SupportPower::find($combination->second_support_power_id));
        }

        return $collection;
    }

    /**
     * Get the second support powers option(s).
     *
     * @param CorePower $firstCorePower
     * @param CorePower $secondCorePower
     * @return Collection
     */
    public function getSecondSupportPowers(CorePower $firstCorePower, CorePower $secondCorePower): Collection
    {
        $combination = $this->getCorePowersSupportPowers($firstCorePower, $secondCorePower);
        $collection = new Collection();

        if ($combination === null) {
            return $collection;
        }

        $collection->push(SupportPower::find($combination->first_support_power_id_2));

        if ($combination->second_support_power_id_2 !== null) {
            $collection->push(SupportPower::find($combination->second_support_power_id_2));
        }

        return $collection;
    }

    public function getUpperAndBottomValues(SupportPower $firstSupportPower, SupportPower $secondSupportPower): array
    {
        if ($secondSupportPower->type === PowerColorHelper::TYPE_DOING
            || ($firstSupportPower->type === PowerColorHelper::TYPE_DARING
                && $secondSupportPower->type === PowerColorHelper::TYPE_DREAMING)
            || ($firstSupportPower->type === PowerColorHelper::TYPE_SHARING
                && $secondSupportPower->type === PowerColorHelper::TYPE_DARING)
            || ($firstSupportPower->type === PowerColorHelper::TYPE_SHARING
                && $secondSupportPower->type === PowerColorHelper::TYPE_DREAMING)) {
            return [
                'upperPower' => $secondSupportPower->power,
                'bottomPower' => $firstSupportPower->power,
                'upperColor' => $secondSupportPower->color,
                'bottomColor' => $firstSupportPower->color,
            ];
        }

        return [
            'upperPower' => $firstSupportPower->power,
            'bottomPower' => $secondSupportPower->power,
            'upperColor' => $firstSupportPower->color,
            'bottomColor' => $secondSupportPower->color,
        ];
    }

    public function isUnicorn(SupportPower $firstSupportPower, SupportPower $secondSupportPower): bool
    {
        return $firstSupportPower->id === 999 || $secondSupportPower->id === 999;
    }
}
