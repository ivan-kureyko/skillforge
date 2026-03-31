<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProgressRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'percent' => ['sometimes', 'integer', 'min:0', 'max:100'],
            'note' => ['sometimes', 'nullable', 'string'],
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'percent' => [
                'description' => 'The updated progress percentage from 0 to 100.',
                'example' => 50,
            ],
            'note' => [
                'description' => 'An optional updated note for this progress entry.',
                'example' => 'Finished the second module and updated the notes.',
            ],
        ];
    }
}
