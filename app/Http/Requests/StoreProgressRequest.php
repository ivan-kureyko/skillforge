<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProgressRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'goal_id' => [
                'required',
                Rule::exists('goals', 'id')->where(function ($query) {
                    $query->where('user_id', $this->user()->id);
                }),
            ],
            'percent' => ['required', 'integer', 'min:0', 'max:100'],
            'note' => ['nullable', 'string'],
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'goal_id' => [
                'description' => 'The ID of the goal that this progress entry belongs to.',
                'example' => 1,
            ],
            'percent' => [
                'description' => 'Progress percentage value from 0 to 100.',
                'example' => 25,
            ],
            'note' => [
                'description' => 'Optional note describing the current progress update.',
                'example' => 'Started the course and completed the first section.',
            ],
        ];
    }
}
