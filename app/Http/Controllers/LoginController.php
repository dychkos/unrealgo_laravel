<?php

namespace App\Http\Controllers;

use AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index(Request $request) {
        return view('auth.login');
    }

    public function login(AuthService $authService, Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $authService->login($request->all());
            $request->session()->regenerate();
        }catch (ValidationException $exception){
            return back();
        }
        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


}
