<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreScheduleRequest extends FormRequest
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
            'day' => ['required', 'string', Rule::in(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'])],
            'hour' => ['required', 'integer', Rule::in([8, 10, 14, 16])],
            'subject_id' => ['required', 'integer', 'exists:App\Models\Subject,id'],
            'classroom_id' => ['required', 'integer', 'exists:App\Models\Classroom,id'],
        ];
    }
}
