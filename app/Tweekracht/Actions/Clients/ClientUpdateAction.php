<?php

declare(strict_types=1);

namespace App\Tweekracht\Actions\Clients;

use App\Models\Client;
use App\Models\CorePower;
use App\Tweekracht\Dto\ClientDto;

final class ClientUpdateAction
{
    public function __invoke(Client $client, ClientDto $clientDto): Client
    {
        $client->update([
            'company_id' => $clientDto->company_id,
            'email' => $clientDto->email,
            'first_name' => $clientDto->first_name,
            'last_name' => $clientDto->last_name,
            'address' => $clientDto->address,
            'zip_code' => $clientDto->zip_code,
            'place' => $clientDto->place,
            'phone_number' => $clientDto->phone_number,
        ]);

        // When a report is made, the powers are fixed and cannot be changed
        if (!$client->report) {
            $client->corePowers->each(function (CorePower $corePower) use ($client, $clientDto) {
                if (!$clientDto->core_powers->contains($corePower)) {
                    $client->corePowers()
                        ->detach($corePower->id);
                }
            });

            $clientDto->core_powers->each(function (CorePower $corePower) use ($client, $clientDto) {
                if (!$client->corePowers->contains($corePower)) {
                    $client->corePowers()
                        ->attach($corePower->id);
                }
            });
        }

        $client->save();

        return $client;
    }
}
