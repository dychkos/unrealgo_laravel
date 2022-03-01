<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        return view('auth.register');
    }


    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(AuthService $authService, Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->all();
        $user = $authService->register($data);

        Auth::loginUsingId($user->id);

        return redirect()->route("home");
    }
}
