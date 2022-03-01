<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index(Request $request) {
        return view('auth.login');
    }

    /**
     * @throws ValidationException
     */
    public function login(AuthService $authService, Request $request): \Illuminate\Http\RedirectResponse
    {
        $authService->login($request->all());
        $request->session()->regenerate();

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }


}
