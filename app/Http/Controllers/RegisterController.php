<?php

namespace App\Http\Controllers;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use App\Http\Requests\RegisterPostRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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
            $message = ['success' => 'The new user was created'];
            Auth::login($newUser);
            return redirect(route('user.private'));
        } else {
            $message = ['error' => 'Failed to create user'];
            return redirect(route('user.register'));
        }
  }
}
