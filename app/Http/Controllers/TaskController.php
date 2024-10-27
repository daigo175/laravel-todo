<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreTaskRequest;

class TaskController extends Controller
{
    /**
     */
    public function index(int $id): View
    {
        $folders = Folder::all();
        $tasks = Folder::find($id)->tasks()->get();
        return view('tasks/index', [
            'folders' => $folders,
            'folder_id' => $id,
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id): View
    {
        return view('tasks/create', ['folder_id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $id, StoreTaskRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $task = new Task;
        $task->title = $request->title;
        $task->due_date = $request->due_date;
 
        $folder = Folder::find($id);
        $folder->tasks()->save($task);

        return redirect()->route('tasks.index', [$folder]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $folder_id, String $task_id): View
    {
        $task = Task::find($task_id);
        
        return view('tasks/edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $folder_id, string $task_id, StoreTaskRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $task = Task::find($task_id);
        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
 
        $task->save();

        $folder = Folder::find($folder_id);
        return redirect()->route('tasks.index', [$folder]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
