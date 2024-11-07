<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function create()
    {
        return view('form');
    }

    public function store()
    {
        return 'store';
    }

    public function edit(Todo $todo)
    {
        return 'edit';
    }

    public function update()
    {
        return 'update';
    }

    public function destroy(int $id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return redirect()->route('home');
    }
}
