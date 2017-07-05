<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \HttpOz\Roles\Models\Role as Role;
use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        // validate
        $this->validate(
            request(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed'
            ]
        );
        
        // search for user role
        $userRole = Role::whereSlug('user')->first();

        // create and save user
        $user = User::create(request(['name', 'email', 'password']));

        // attach user role
        $user->attachRole($userRole);

        // sign in
        auth()->login($user);

        return redirect('dashboard');
    }
}
