<?php

namespace App\Http\Requests;

use App\Http\Dto\UserDto;

class RegisterPostRequest extends AppFormRequest
{
    public function rules(): array
    {
        $passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

        return [
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|string|email|min:6|max:100|unique:users,email',
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
            'name.required' => 'You need input the name',
            'email.required' => 'You need input the email',
            'email.unique' => 'The user already exists',
            'email.email' => 'Not valid email',
            'password.required' => 'You need input the password',
            'password.regex' => 'Not valid password'
        ];
    }

    public function getDto(): UserDto
    {
        return new UserDto(
            $this->post('name'),
            $this->post('email'),
            $this->post('password'),
        );
    }
}
