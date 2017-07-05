<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use HttpOz\Roles\Models\Role as Role;
use App\User;
use App\Post;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $users = Role::with('users')->get();

        return view('dashboard.index', compact('users'));
    }
}
