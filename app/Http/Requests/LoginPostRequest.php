<?php

namespace App\Http\Requests;

use App\Http\Dto\CreateDto;

class LoginPostRequest extends AppFormRequest
{
    public function rules(): array
    {
        $passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

        return [
            'email' => 'required|string|email|min:6|max:100',
            'password' => [
                'required',
                'string',
                'min:8',
                'max:100',
                'regex:' . $passwordRegex,
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'You need input the email',
            'email.email' => 'Not valid email',
            'password.required' => 'You need input the password',
            'password.regex' => 'Not valid password'
        ];
    }
}
