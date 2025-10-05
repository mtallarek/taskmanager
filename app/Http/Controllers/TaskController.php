<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Carbon;

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

        return $tasks->get()->toResourceCollection();
    }

    public function indexByUser($userId)
    {
        return Task::where(['user_id' => $userId])->get()->toResourceCollection();
    }

    public function indexByProject($projectId)
    {
        return Task::where(['project_id' => $projectId])->get()->toResourceCollection();
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
    public function show(string $id)
    {
        return Task::findOrFail($id)->toResource();
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, string $id)
    {
        $data = $request->validated();

        $task = Task::findOrFail($id);

        $task->update($data);

        return $task->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json('Task ' . $id . ' successfully deleted');

    }
}
