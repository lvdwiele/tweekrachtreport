<?php

declare(strict_types=1);

namespace App\Tweekracht\Actions\Clients;

use App\Models\Client;
use App\Models\CorePower;
use App\Models\User;
use App\Tweekracht\Dto\ClientDto;

final class ClientCreateAction
{
    public function __invoke(User $user, ClientDto $clientDto): Client
    {
        /** @var Client $client */
        $client = $user->clients()->create([
            'company_id' => $clientDto->company_id,
            'email' => $clientDto->email,
            'first_name' => $clientDto->first_name,
            'last_name' => $clientDto->last_name,
            'address' => $clientDto->address,
            'zip_code' => $clientDto->zip_code,
            'place' => $clientDto->place,
            'phone_number' => $clientDto->phone_number,
        ]);

        $clientDto->core_powers->each(function (CorePower $corePower) use ($client) {
            $client->corePowers()->attach($corePower->id);
        });

        $client->save();

        return $client;
    }
}
