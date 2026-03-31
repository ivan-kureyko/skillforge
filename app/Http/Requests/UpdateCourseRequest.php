<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'skill_ids' => ['required', 'array', 'min:1'],
            'skill_ids.*' => ['integer', 'distinct', 'exists:skills,id'],
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'title' => [
                'description' => 'The updated title of the course.',
                'example' => 'Laravel REST API',
            ],
            'description' => [
                'description' => 'The updated description of the course.',
                'example' => 'An updated course description with a focus on API development.',
            ],
            'skill_ids' => [
                'description' => 'An updated array of skill IDs associated with the course.',
                'example' => [1, 3],
            ],
            'skill_ids.*' => [
                'description' => 'A valid unique skill ID.',
                'example' => 1,
            ],
        ];
    }
}
