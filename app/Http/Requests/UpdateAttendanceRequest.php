<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAttendanceRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'justify' => ['required', 'boolean'],
            'created_at' => ['required', 'date'],
            'duration' => ['required', 'integer', 'between:1,6'],
            'user_id' => ['required', 'exists:App\Models\User,id'],
        ];
    }
}
