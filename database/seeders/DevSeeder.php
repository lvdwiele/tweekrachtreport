<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DevSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);

        User::factory()
            ->create([
                'role_id' => Role::ROLE_ADMIN,
                'email' => 'dev@code337.rocks',
            ]);
    }
}
