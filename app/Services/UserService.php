<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

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

        if(Auth::user()->phone && Auth::user()->phone === $userData['phone']){
            unset($userData['phone']);
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
            'phone' => [
                'sometimes',
                'required',
                'string',
                function ($attribute, $value, $fail) use ($authRepository) {
                    if ($authRepository->checkPhoneExists($value)) {
                        $fail('Этот телефон уже ипользуется.');
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

    /**
     * @throws ValidationException
     */
    public function delete($userID) {
        if(empty($userID)){
            throw ValidationException::withMessages(['user_remove_error' => 'Не удалось удалить аккаунт']);
        }else{
            return $this->userRepository->delete($userID);
        }
    }

    /**
     * @throws ValidationException
     */
    public function clearLiked($userID): bool
    {
        if(empty($userID)){
            throw ValidationException::withMessages(['liked_clear_error' => 'Не удалось очистить избранное']);
        }else{
            return $this->userRepository->clearLiked($userID);
        }
    }

}
