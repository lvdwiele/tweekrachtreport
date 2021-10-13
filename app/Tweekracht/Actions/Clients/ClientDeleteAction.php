<?php

declare(strict_types=1);

namespace App\Tweekracht\Actions\Clients;

use App\Models\Client;

final class ClientDeleteAction
{
    public function __invoke(Client $client): bool
    {
        return $client->delete();
    }
}
