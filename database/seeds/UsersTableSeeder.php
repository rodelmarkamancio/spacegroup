<?php

use Illuminate\Database\Seeder;
use \HttpOz\Roles\Models\Role as Role;
use \App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. query the Roles by the slug
        $adminRole = Role::whereSlug('admin')->first();
        $userRole = Role::whereSlug('user')->first();

        // 2a. Create admin
        $admin = User::create([
            'name' => 'Rodel Trigger',
            'email' => 'rodel@gmail.com',
            'password' => 'test123'
        ]);

        // 2b. Create forum moderator
        $user = User::create([
            'name' => 'Rodel Ninja',
            'email' => 'r.amancio@arcanys.com',
            'password' => 'test123'
        ]);

        // 3. Attach a role to the user object / assign a role to a user
        $admin->attachRole($adminRole);
        $user->attachRole($userRole);
    }
}
