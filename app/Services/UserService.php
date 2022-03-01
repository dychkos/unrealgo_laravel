<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserService
{
    private UserRepository $userRepository;
    private AuthRepository $authRepository;

    public function __construct(UserRepository $userRepository, AuthRepository $authRepository)
    {
        $this->userRepository = $userRepository;
        $this->authRepository = $authRepository;
    }

    public function update($userData)
    {
        $userRepository = $this->userRepository;
        $authRepository = $this->authRepository;

        if(Auth::user()->email === $userData['email']){
            unset($userData['email']);
        }

        $validatedUser = Validator::make($userData,[
            'id' => ["required", "integer"],
            'name' => ["required", "string","max:25"],
            'image' => ["nullable", "array"],
            'email' => [
                'sometimes',
                'required',
                'email',
                function ($attribute, $value, $fail) use ($authRepository) {
                    if ($authRepository->checkEmailExists($value)) {
                        $fail('Этот ' . $attribute. ' уже ипользуется.');
                    }
                },
            ],
            'status' => ["nullable", "boolean"],
            'notification' => ["nullable", "boolean"],
            'password' => 'sometimes|min:6|required_with:confirm-password|same:confirm-password',
            'confirm-password' => ["sometimes", "min:6", "string"],
            'role_id' => ["nullable", "integer"],
        ])->validate();

        return $userRepository->update($validatedUser);
    }

}
