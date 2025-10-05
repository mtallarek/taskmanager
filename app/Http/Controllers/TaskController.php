<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $params = $request->validate([
            'overdue' => 'boolean',
            'user_id' => 'integer|exists:users,id',
            'project_id' => 'integer|exists:projects,id',
        ]);


        $tasks = Task::query();

        if($params) {
            if($params['overdue'] ?? false == true ) {
                $tasks = $tasks->where('deadline','<', Carbon::today());
            }

            if($params['user_id'] ?? false) {
                $tasks->where('user_id', $params['user_id']);
            }

            if($params['project_id'] ?? false) {
                $tasks->where('project_id', $params['project_id']);
            }
        }

        //Only allow own tasks
        //Yeah, this does not make much sense right now
        $tasks = $tasks->where('user_id', auth()->user()->id);

        return $tasks->get()->toResourceCollection();
    }

    public function indexByUser(User $user)
    {
        return $user->tasks->toResourceCollection();
    }

    public function indexByProject(Project $project)
    {
        //Only allow own tasks
        return $project->tasks()->where(['user_id' => auth()->user()->id])->get()->toResourceCollection();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $data = $request->validated();

        $task = Task::create($data);

        return $task->toResource();
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return $task->toResource();
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $data = $request->validated();

        $task->update($data);

        return $task->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $taskId = $task->id;
        $task->delete();

        return response()->json('Task ' . $taskId . ' successfully deleted');

    }
}
