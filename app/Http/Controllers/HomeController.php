<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /**
         * @var \App\Models\User $user
         */
        $user = Auth::user();

        $todos = $user->todos()
            ->orderBy('priority', 'desc')
            ->get();

        return view('home', compact('todos'));
    }
}
