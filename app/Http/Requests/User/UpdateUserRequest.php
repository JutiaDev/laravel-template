<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'isValidUserName'],
            'email' => ['required', 'email', ' max:255', 'unique:users'],
            'roles' => ['sometimes', 'exists:roles,id'],
        ];
    }
}
