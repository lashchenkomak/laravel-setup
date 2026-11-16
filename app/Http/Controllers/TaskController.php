<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('project')
            ->paginate(10);

        return TaskResource::collection($tasks);
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::create(
            $request->validated()
        );

        $task->load('project');

        return new TaskResource($task);
    }

    public function show(
        Request $request,
        Task $task
    ) {
        $task->load('project');

        $include = explode(
            ',',
            $request->query('include', '')
        );

        if (in_array('comments', $include, true)) {
            $task->load('comments');
        }

        return new TaskResource($task);
    }

    public function update(
        UpdateTaskRequest $request,
        Task $task
    ) {
        $task->update(
            $request->validated()
        );

        $task->load('project');

        return new TaskResource($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->noContent();
    }
}
