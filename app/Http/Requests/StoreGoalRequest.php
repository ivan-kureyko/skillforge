<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGoalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'course_id' => [
                'required',
                'exists:courses,id'
            ],
            'deadline' => [
                'required',
                'date',
                'after:today'
            ],
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'title' => [
                'description' => 'The title of the goal.',
                'example' => 'Complete Laravel API project',
            ],
            'course_id' => [
                'description' => 'The ID of the course linked to this goal.',
                'example' => 1,
            ],
            'deadline' => [
                'description' => 'The target completion date. It must be a future date.',
                'example' => '2026-04-30',
            ],
        ];
    }
}
