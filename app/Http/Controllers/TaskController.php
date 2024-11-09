<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule as ValidationRule;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::paginate(3);
        return view('tasks.index', compact('tasks'));
    }

    public function dashboard()
    {
        $tasksFromDB = Task::where("user_id", auth()->id())->get();
        return view('dashboard', ['tasks' => $tasksFromDB]);
    }

    public function guest()
    {
        $tasks = Task::paginate(3);
        return view('guest', compact('tasks'));
    }

    public function show(Task $task)
    {
        $singleTaskFromDB = Task::findOrFail($task->id);
        return view('tasks.show', ['task' => $singleTaskFromDB]);
    }

    public function create()
    {
        $users = User::all();
        return view('tasks.create', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => [
                'required',
                'unique:App\Models\Task,title',
                'unique:tasks,title',
                'unique:my_connection.tasks,title',
                ValidationRule::unique('my_connection.tasks', 'title')->ignore($request->title),
            ],
            'description' => 'required|min:3',
        ]);

        $user = auth()->user();
        $task = new Task;

        $task->title = $request->title;
        $task->description = $request->description;
        $task->user_id = $user->id;
        // $task->email = $user->email;
        $task->created_at = $user->created_at;
        $task->updated_at = $user->updated_at;
        $task->save();

        session()->flash('status', 'Task was successfully created!');
        return to_route('tasks.index', compact('task'));
    }


    
    public function edit(Task $task)
    {
        if (auth()->id() != $task->user_id) {
            return back()->with('error', 'Unauthorized action');
        }

        $users = User::all();
        return view('tasks.edit', ['users' => $users, 'task' => $task]); // Pass as 'task'
    }

    public function update(Request $request, Task $task)
    {
        $user = auth()->user();

        // Update the existing task instead of creating a new one
        $task->title = $request->title;
        $task->description = $request->description;
        $task->user_id = $user->id;
        $task->name = $user->name;
        $task->email = $user->email;

        $task->save();

        return to_route('tasks.show', $task->id);
    }











    public function destroy(Task $task)
    {
        if (auth()->id() != $task->user_id) {
            return back()->with('error', 'Unauthorized action');
        }

        $task->delete();

        return back()->with('success', 'Task deleted successfully');
    }
}
