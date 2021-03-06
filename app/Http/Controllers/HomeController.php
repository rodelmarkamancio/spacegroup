<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DashboardHome;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']); 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home = DashboardHome::latest()->get()[0];
        
        return view('home.index', compact('home'));
    }
}
