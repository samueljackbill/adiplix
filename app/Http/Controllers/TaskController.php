<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        // Recuperar os registros do banco dados
        $tasks = Task::orderByDesc('id')->get();

        // Carregar a VIEW
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        // Carregar a VIEW
        return view('tasks.create');
    }

    public function store(TaskRequest $request)
    {
        // Validar o formulário
        $request->validated();

        // Cadastrar o usuário no BD
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('task.index')->with('success', 'Tarefa cadastrada com sucesso!');
    }

    public function show(Task $task)
    {
        return view('tasks.show', ['task' => $task]);
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }

    public function update(TaskRequest $request, Task $task)
    {
        // Validar o formulário
        $request->validated();

        // Editar as informações do registro no banco de dados
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('task.show', ['task' => $task->id])->with('success', 'Tarefa editada com sucesso!');
    }

    public function destroy(Task $task)
    {
        // Apagar o registro no BD
        $task->delete();

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('task.index')->with('success', 'Usuário apagado com sucesso!');
    }
}
