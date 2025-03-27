<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the Task is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $taskId = $this->route('task');

        return [
            'title' => 'required|unique:tasks,title,' . ($taskId ? $taskId->id : null),
        ];
    }

    public function messages(): array
    {
        return[
            'title.required' => 'Campo título é obrigatório!',
            'title.unique' => 'A tarefa já está cadastrada!',
        ];
    }
}
