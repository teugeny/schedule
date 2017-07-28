<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

/**
 * Class TaskController
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{
    /**
     * Get list of tasks
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function get($id) {
        return Task::where('id',$id)->get();
    }

    public function add(Request $request) {
        $task = new Task();
        $task->name = $request['name'];
        $task->value = $request['value'];
        $task->status = 'new';
        $result =  $task->save()
            ? "success"
            : "failed";

        return view('task_add',[
            'result' => $result
        ]);
    }
}
