<?php

namespace App\Http\Controllers;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


use App\Http\Requests\LoginPostRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(LoginPostRequest $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect(route('user.private'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
  }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        // После выполнения логоута, вы можете выполнить перенаправление на нужную страницу
        return redirect('/'); // Например, перенаправление на главную страницу
    }
}
