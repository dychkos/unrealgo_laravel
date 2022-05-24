<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AuthService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;

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

    public function redirectToGoogle(): \Symfony\Component\HttpFoundation\RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirectToFacebook(): \Symfony\Component\HttpFoundation\RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleGoogleCallback(): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
       return $this->authorizeBySocial('google');
    }

    public function handleFacebookCallback(): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        return $this->authorizeBySocial('facebook');
    }

    public function authorizeBySocial($driver): \Illuminate\Http\RedirectResponse
    {
        try{
            $user = Socialite::driver($driver)->user();

            $finduser = User::where($driver . '_id', $user->id)->first();

            if($finduser) {
                Auth::login($finduser);
                return redirect()->route("home");

            } else {

                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => encrypt($user->email),
                    $driver . '_id'=> $user->id

                ]);
                Auth::login($newUser);
                return redirect()->route("home");
            }
        } catch (Exception $e) {
            return redirect()->route($driver."_auth");
        }

    }


}
