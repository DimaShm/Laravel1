<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterPostRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
    }

    public function register(RegisterPostRequest $request): RedirectResponse
    {
        $dto = $request->getDto();
        $newUser = $this->user->createUser($dto);

        if ($newUser) {
            Auth::login($newUser);
            return redirect(route('user.private'));
        } else {
            return redirect(route('user.register'));
        }
    }
}
