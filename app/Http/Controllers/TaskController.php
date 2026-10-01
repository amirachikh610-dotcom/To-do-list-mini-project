<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->get();
        return view('tasks', compact('tasks'));
    }
    
    public function store(Request $request)
    {
        $request->validate(['title' => 'required|max:255']);
        Task::create(['title' => $request->title]);
        return redirect('/');
    }

    public function toggle(Task $task)
    {
        $task->update(['done' => !$task->done]);
        return redirect('/');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/');
    }

}
