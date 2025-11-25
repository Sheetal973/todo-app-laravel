<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $todos = Todo::when($search, function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        })
            ->orderBy('datetime', 'asc')
            ->get();

        return view('welcome', compact('todos', 'search'));
    }

    public function add_todo(Request $request)
    {
        return view('to-do.add');
    }

    public function store_todo(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'datetime' => 'required|date',
        ]);

        Todo::create([
            'name' => $request->name,
            'datetime' => $request->datetime,
        ]);

        return redirect()->route('home')->with('success', 'Todo added successfully');
    }

    public function edit_todo($id)
    {
        $todo = Todo::findOrFail($id);
        return view('to-do.edit', compact('todo'));
    }

    public function update_todo(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'datetime' => 'required|date',
        ]);

        $todo = Todo::findOrFail($id);

        $todo->name = $request->name;
        $todo->datetime = $request->datetime;

        if ($request->has('is_completed')) {
            $todo->is_completed = $request->is_completed;
        }

        $todo->save();

        return redirect()->route('home')->with('success', 'Todo updated successfully');
    }

    public function delete_todo($id)
    {
        $todo = Todo::findOrFail($id); // Find the todo or throw 404
        $todo->delete();               // Delete the todo

        return redirect()->back()->with('success', 'Todo deleted successfully');
    }

    public function toggle_todo($id)
    {
        $todo = Todo::findOrFail($id);

        // If completed (1), make pending (0)
        // If pending (0), make completed (1)
        $todo->is_completed = $todo->is_completed == 1 ? 0 : 1;
        $todo->save();

        return redirect()->back()->with('success', 'Status updated successfully');
    }
}
