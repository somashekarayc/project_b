<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Models\task;
use App\Http\Requests\StoretaskRequest;
use App\Http\Requests\UpdatetaskRequest;

class TaskController extends Controller
{

    public function index()
    {
        return TaskResource::collection(Task::all());
    }


    public function store(StoretaskRequest $request)
    {
        $task = Task::create($request->validated());

        return response()->json(new TaskResource($task), 201);
    }


    public function show(Task $task)
    {
        return new TaskResource($task);
    }


    public function update(UpdatetaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return new TaskResource($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(null, 204);

    }
}
