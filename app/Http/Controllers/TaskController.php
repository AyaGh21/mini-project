<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{

    public function index()
    {
        return Task::all();
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string',
        'description' => 'nullable|string',
        'due_date' => 'nullable|date',
        'status' => 'nullable|in:pending,done'
    ]);

    \Log::info('Validated data:', $validated); // Log validated input

    $task = Task::create($validated);

    \Log::info('Created Task:', $task->toArray()); // Log created task data

    return response()->json($task, 201);
}


    public function show($id)
    {
        return Task::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => 'nullable|in:pending,done'
        ]);

        $task->update($validated);
        return response()->json($task);
    }

    public function destroy($id)
    {
        Task::destroy($id);
        return response()->json(['message' => 'Task deleted']);
    }
}
