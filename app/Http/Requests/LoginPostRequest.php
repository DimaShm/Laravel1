<?php

namespace App\Http\Requests;

use App\Http\Dto\UserDto;
use Illuminate\Validation\Rules\Password;

class LoginPostRequest extends AppFormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|min:6|max:100',
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
