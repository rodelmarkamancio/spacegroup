<?php

use Illuminate\Database\Seeder;
use \HttpOz\Roles\Models\Role as Role;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Custodians of the system.', // optional
            'group' => 'default' // optional, set as 'default' by default
        ]);

        Role::create([
            'name' => 'User',
            'slug' => 'user',
        ]);
    }
}
