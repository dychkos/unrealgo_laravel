<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Services\MailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    private AuthService $authService;
    private MailService $mailService;

    public function __construct(AuthService $authService, MailService $mailService)
    {
        $this->mailService = $mailService;
        $this->authService = $authService;
    }

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
        //$this->mailService->wasRegistered($user->email);

        return redirect()->route("home");
    }
}
