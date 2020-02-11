<?php

namespace Austeam\TodoList;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Austeam\TodoList\Task;

class TaskController extends Controller
{
    public function index()
    {
        return redirect()->route('task.create');
    }

    public function create()
    {
        $tasks = Task::all();
        $submit = 'Add';
        return view('austeam.todolist.list', compact('tasks', 'submit'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Task::create($input);
        return redirect()->route('task.create');
    }

    public function edit($id)
    {
        $tasks = Task::all();
        $task = $tasks->find($id);
        $submit = 'Update';
        return view('austeam.todolist.list', compact('tasks', 'task', 'submit'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $task = Task::findOrFail($id);
        $task->update($input);
        return redirect()->route('task.create');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('task.create');
    }
}
