<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoListRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'max:100'
        ];
    }

    public function messages(): array
    {
        $errors = [
            'title.required' => 'Заполните поле "Название"',
            'description.max' => 'Максимальная длина 100 симфолов'
        ];

        return $errors;
    }
}
