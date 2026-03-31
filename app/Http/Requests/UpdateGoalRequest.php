<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGoalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'deadline' => ['sometimes', 'date', 'after:today'],
            'status' => ['sometimes', 'in:new,in_progress,completed'],
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'title' => [
                'description' => 'The updated title of the goal.',
                'example' => 'Finish Laravel API authentication',
            ],
            'deadline' => [
                'description' => 'The updated target completion date. It must be a future date.',
                'example' => '2026-05-15',
            ],
            'status' => [
                'description' => 'The updated status of the goal.',
                'example' => 'in_progress',
            ],
        ];
    }
}
