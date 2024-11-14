<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function create()
    {
        return view('form');
    }

    public function store(StoreTodoRequest $request)
    {
        $data = $request->validated();

        Todo::create([
            'user_id' => Auth::id(),
            'title' => $data['title'],
            'content' => $data['content'],
            'priority' => $data['priority'],
        ]);

        return redirect()->route('home');
    }

    public function edit(Todo $todo)
    {
        return view('form', compact('todo'));
    }

    public function update(StoreTodoRequest $request, Todo $todo)
    {
        $data = $request->validated();

        $todo->update([
            'title' => $data['title'],
            'content' => $data['content'],
            'priority' => $data['priority'],
        ]);

        return redirect()->route('home');
    }

    public function destroy(int $id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return redirect()->route('home');
    }
}
