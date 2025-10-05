<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
        return [
            'title'  => ['string', 'string', 'min:1', 'max:128'],
            'description' => ['string', 'max:1024', 'nullable'],
            'deadline' => ['date', 'after_or_equal:today', 'nullable'],
            'status_id'  => ['required', 'integer', 'exists:statuses,id'],
            'project_id'  => ['nullable', 'integer', 'exists:projects,id'],
            'user_id'  => ['nullable', 'integer', 'exists:users,id'],
        ];
    }
}
