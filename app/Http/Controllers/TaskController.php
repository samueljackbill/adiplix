<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        // Recuperar os registros do banco dados
        /*$tasks = Task::orderByDesc('id')->get();*/

        // Carregar a VIEW
        return view('tasks.index'/*, ['tasks' => $tasks]*/);
    }
}
