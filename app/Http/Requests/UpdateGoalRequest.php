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
}
