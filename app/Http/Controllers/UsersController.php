<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use HttpOz\Roles\Models\Role as Role;
use App\User;
use App\Post;

class UsersController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
        $this->middleware('auth');
    }

    public function index()
    {
        $users = Role::with('users')->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store()
    {
        // validate
        $this->validate(
            request(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'role' => 'required'
            ]
        );

        // search for user role
        $userRole = Role::whereSlug('user')->first();
        $adminRole = Role::whereSlug('admin')->first();
        
        // create and save user
        $user = User::create(request(['name', 'email', 'password']));
        $user = User::find($user->id);

        // attach user role
        if (request('role') == 1) {
            $user->attachRole($adminRole);
        } else if (request('role') == 2) {
            $user->attachRole($userRole);
        }

        // sign in
        // auth()->login($user);
        // flash message
        \Session::flash('flash_message', request('name') . ' was successfully saved.');

        return redirect()->back();
    }

    public function edit(User $user)
    {
        // $users = Role::with('users')->get(); 
        $users = Role::join('role_user', 'role_user.role_id', '=', 'roles.id')
                    ->join('users', 'users.id', '=', 'role_user.user_id')
                    ->where('users.id', $user->id)
                    ->get(['users.id', 'users.name', 'users.email', 'users.password', 'roles.slug']);

        return view('users.edit', compact('users'));
    }
    
    public function update(Request $request, $id)
    {
        $this->validate(
            request(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:6',
                'role' => 'required'
            ]
        );

        // User::find($id)->update(
        //     [
        //         'name' => request('name'),
        //         'email' => request('email'),
        //         'password' => request('password'),
        //     ]
        // );
        $user = User::findOrFail($id);
        $input = $request->all();
        $user->fill($input)->save();

        // flash message
        \Session::flash('flash_message', request('name') . ' was successfully updated.');

        return redirect()->back();
    }
}
