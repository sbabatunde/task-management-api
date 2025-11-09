<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ];

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['status'] = 'required|in::pending, in-progress,completed';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than 255 characters',
            'description.required' => 'The description field is required.',
            'description.max' => 'The description may not be greater than 1000 characters',
            'status.required' => 'The status field is required.',
            'status.in' => 'The status must be one of:pending,in-progress,completed.',
        ];
    }
}
