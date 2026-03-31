<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSkillRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        $skill = $this->route('skill');

        return [
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('skills', 'title')->ignore($skill),
            ],
            'description' => ['nullable', 'string'],
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'title' => [
                'description' => 'The updated title of the skill.',
                'example' => 'Laravel Advanced',
            ],
            'description' => [
                'description' => 'The updated description of the skill.',
                'example' => 'Advanced backend development with Laravel.',
            ],
        ];
    }
}
