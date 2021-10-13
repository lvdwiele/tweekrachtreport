<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::query()->create([
            'id' => Role::ROLE_COACH,
            'name' => 'Coach'
        ]);

        Role::query()->create([
            'id' => Role::ROLE_ADMIN,
            'name' => 'Admin'
        ]);
    }
}
