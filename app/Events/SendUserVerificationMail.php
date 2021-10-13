<?php

declare(strict_types=1);

namespace App\Events;

use App\Jobs\SendUserRegistrationMail;
use Illuminate\Auth\Events\Registered;

class SendUserVerificationMail
{
    /**
     * Handle the event.
     *
     * @param Registered $event
     */
    public function handle(Registered $event): void
    {
        SendUserRegistrationMail::dispatch($event->user);
    }
}
