<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|max:255',
            'description' => 'nullable',
            'due_date' => 'nullable|date',
        ]);

        Task::create([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => 'Pending',
        ]);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task added successfully!');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'task_name' => 'required|max:255',
            'description' => 'nullable',
            'due_date' => 'nullable|date',
            'status' => 'required|in:Pending,Completed',
        ]);

        $task->update([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task updated successfully!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task deleted successfully!');
    }

    public function complete(Task $task)
    {
        $task->update([
            'status' => 'Completed'
        ]);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task completed!');
    }
}