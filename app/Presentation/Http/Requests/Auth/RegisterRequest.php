<?php

namespace Presentation\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
            ],
            'password' => [
                'required',
                'string',
                'confirmed',
                'min:8',
                'max:255',
            ],
            'phone' => [
                'required',
                'string',
                'min:8',
                'max:15',
                'regex:/^\+?[0-9]+$/',
            ],
        ];
    }

    /**
     * Custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is mandatory.',
            'lastname.required' => 'The lastname field is mandatory.',
            'email.required' => 'The email field is mandatory.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'This email is already in use.',
            'phone.required' => 'The phone number is mandatory.',
            'phone.regex' => 'The phone number must be a valid format.',
            'password.required' => 'The password is mandatory.',
            'password.required' => 'The password min length is 8.',
            'password.confirmed' => 'The password confirmation does not match.',
        ];
    }
}
