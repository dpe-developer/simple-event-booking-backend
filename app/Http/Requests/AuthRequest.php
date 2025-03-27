<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
        if (request()->isMethod('POST') && request()->path() == 'api/v1/auth/register') {
            // Validation rules for registration
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
                'role' => 'sometimes|required|in:admin,user'
            ];
        }

        if (request()->isMethod('POST') && request()->path() == 'api/v1/auth/login') {
            // Validation rules for login
            return [
                'email' => 'required|email',
                'password' => 'required|string',
            ];
        }

        return [];
    }
}
