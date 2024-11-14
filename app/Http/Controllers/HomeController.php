<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function index(Request $request)
    {
        /**
         * @var \App\Models\User $user
         */
        $user = Auth::user();

        $priority = $request->get('priority');

        $todos = $user->todos()
            ->when($priority, function ($query, $priority) {
                return $query->where('priority', $priority);
            })
            ->when(!$priority, function ($query) {
                return $query->orderBy('priority', 'desc');
            })
            ->paginate(15);

        return view('home', compact('todos'));
    }
}
