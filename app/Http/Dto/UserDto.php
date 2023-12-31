<?php
namespace App\Http\Dto;

final class UserDto {
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
    )
    {
    }
}
