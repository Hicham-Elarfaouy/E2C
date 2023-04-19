<?php

namespace App\Http\Requests;

use App\Rules\IsStudent;
use Illuminate\Foundation\Http\FormRequest;

class StoreResultRequest extends FormRequest
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
            'note' => ['required', 'decimal:0,2', 'between:0,20'],
            'user_id' => ['required', 'integer', 'exists:App\Models\User,id', new IsStudent()],
        ];
    }
}
