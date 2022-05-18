<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class PasswordDevCommand extends Command
{
    protected $signature = 'password:dev';

    protected $description = 'Command description';

    public function handle()
    {
        if (config('app.env') !== 'local') {
            return 0;
        }

        User::get()
            ->each(function (User $user) {
                $user->password = \Hash::make('secret');
                $user->save();
            });

        $this->line('Every user now has the password "secret".');
    }
}
