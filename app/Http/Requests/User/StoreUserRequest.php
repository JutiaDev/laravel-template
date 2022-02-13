<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'isValidUserName'],
            'email' => ['sometimes', 'email', ' max:255', 'unique:users,email'],
            'roles' => ['sometimes', 'exists:roles,id'],
        ];
    }
}
