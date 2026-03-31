<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
                'description' => 'The title of the course.',
                'example' => 'Laravel for Beginners',
            ],
            'description' => [
                'description' => 'An optional description of the course.',
                'example' => 'A practical course covering Laravel fundamentals.',
            ],
            'skill_ids' => [
                'description' => 'An array of skill IDs associated with the course. At least one skill is required.',
                'example' => [1, 2],
            ],
            'skill_ids.*' => [
                'description' => 'A valid unique skill ID.',
                'example' => 1,
            ],
        ];
    }
}
