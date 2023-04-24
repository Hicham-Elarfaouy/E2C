<?php

namespace App\Http\Requests;

use App\Models\Role;
use App\Rules\IsStudent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'cin' => ['nullable', 'regex:/^[a-zA-Z]{2}[0-9]{4,6}$/i'],
            'cne' => ['nullable', 'regex:/^[a-zA-Z]{1}[0-9]{13,15}$/i'],
            'name' => ['required', 'string'],
            'username' => ['required'],
            'phone' => ['required', 'regex:/^(0)[6-7]{1}[0-9]{8}$/i'],
            'gender' => ['required', Rule::in(['men', 'women'])],
            'birthday' => ['required', 'date'],
            'email' => ['required', 'email'],
            'address' => ['required', 'string'],
            'role_id' => ['required', 'exists:App\Models\Role,id'],
            'classroom_id' => ['nullable', 'required_if:role_id,5', 'exists:App\Models\Classroom,id'],
            'level_id' => ['nullable', 'required_if:role_id,5', 'exists:App\Models\Level,id'],
            'parent_name' => ['nullable', 'required_if:role_id,5', 'string'],
            'parent_relation' => ['nullable', 'required_if:role_id,5', 'string'],
            'parent_phone' => ['nullable', 'required_if:role_id,5', 'regex:/^(0)[6-7]{1}[0-9]{8}$/i'],
        ];
    }
}
