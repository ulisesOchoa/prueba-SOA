<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return TaskResource::collection(
            Task::where('user_id', Auth::user()->id)->get()
        );
    }

    public function store(StoreTaskRequest $request)
    {
        $request->validated($request->all());

        $task = Task::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority
        ]);

        return new TaskResource($task);
    }

    public function show(Task $task)
    {
        return $this->isNotAuthorized($task) ? $this->isNotAuthorized($task) : new TaskResource($task);
    }

    public function update(Request $request, Task $task)
    {
        if (Auth::user()->id !== $task->user_id) {
            return $this->error('', 'No está autorizado a realizar esta solicitud', 403);
        }

        $task->update($request->all());

        return new TaskResource($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return $this->isNotAuthorized($task) ? $this->isNotAuthorized($task) : $task->delete();
    }

    public function isNotAuthorized($task)
    {
        if (Auth::user()->id !== $task->user_id) {
            return $this->error('', 'No está autorizado a realizar esta solicitud', 403);
        }
    }
}
