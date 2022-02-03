<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Status;
use \App\Http\Requests\TaskCreateRequest;

class TaskController extends Controller
{
    public function index()
    {
      //  $tasks = Task::with('status')->groupBy('status.name')->get()->toArray();
        $tasks = Status::with('tasks')->whereHas('tasks')->get()->groupBy('name')->toArray();
        return array_reverse($tasks);      
    }

    public function store(TaskCreateRequest $request)
    {
        $validated = $request->validated();
        $validatedInput = $request->safe()->only(['title', 'description', 'status_id']);
       
        $task = new Task([
            'title' => $validatedInput['title'],
            'description' => $validatedInput['description'],
            'status_id' => $validatedInput['status_id']
        ]);

        $task->save();
        
        $data['message'] = 'Record Created';
        $data['data'] = $task;

        return response()->json($data, 201);
    }

    public function show($id)
    {
        $task = Task::find($id);
        return response()->json($task);
    }

    public function update($id, Request $request)
    {
        $task = Task::find($id);
        $task->update($request->all());
        return response()->json('Task updated!');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return response()->json('Task deleted!');
    }

    public function update_status(Request $request)
    {
        
        $task = Task::whereHas('status', function($q) use($request){
            $q->where('id', $request->status_id);
        })->where('tasks.id', $request->task_id)->first();
        
        if($task){
            $task->status_id = $request->new_status;
            $task->save();
        }
        
        return response()->json($task);
    }
}
