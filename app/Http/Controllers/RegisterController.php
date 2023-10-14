<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterPostRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(RegisterPostRequest $request): RedirectResponse
    {
        $dto = $request->getDto();
        $user = new User();
        $newUser = $user->createUser($dto);

        if ($newUser) {
            Auth::login($newUser);
            return redirect(route('index'));
        } else {
            return redirect(route('register'));
        }
    }
}
