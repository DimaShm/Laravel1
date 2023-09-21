<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginPostRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(LoginPostRequest $request): RedirectResponse
    {
        $dto = $request->getDto();
        if (Auth::attempt((array)$dto)) {
            $request->session()->regenerate();

            return redirect(route('index'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
  }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect('/');
    }
}
