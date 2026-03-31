<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSkillRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255', 'unique:skills,title'],
            'description' => ['nullable', 'string'],
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'title' => [
                'description' => 'The title of the skill.',
                'example' => 'Laravel',
            ],
            'description' => [
                'description' => 'A short description of the skill.',
                'example' => 'Backend framework for building web applications.',
            ],
        ];
    }
}
