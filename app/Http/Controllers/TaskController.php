<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
       $tasks = \App\Models\Task::all();  
    return view('tasks', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);

        return redirect('/')->with('success', 'Task added successfully!');
    }

public function update(Request $request, $id)
{
    $task = Task::findOrFail($id);

    $task->update([
        'status' => 'done'
    ]);

    return redirect()->back()->with('success', 'Task marked as done!');
}


    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/')->with('success', 'Task deleted!');
    }
}
