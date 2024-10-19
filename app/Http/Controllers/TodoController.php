<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return 'todo';
    }

    public function store()
    {
        return 'store';
    }

    public function update()
    {
        return 'update';
    }

    public function destroy()
    {
        return 'destroy';
    }

    public function show()
    {
        return 'show';
    }
}
