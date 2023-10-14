<?php

namespace App\Http\Requests;

use App\Http\Dto\UserDto;
use Illuminate\Validation\Rules\Password;

class RegisterPostRequest extends AppFormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|string|email|min:6|max:100|unique:users,email',
            'password' => [
                'required',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
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
