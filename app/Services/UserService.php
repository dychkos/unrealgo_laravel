<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function update($userData)
    {
        $userRepository = $this->userRepository;

        $validatedUser = Validator::make($userData,[
            'id' => ["required","integer"],
            'name' => ["required","string","max:25"],
            'image' => ["nullable","array"],
            'role_id' => ["nullable","integer"],
        ])->validate();

        return $userRepository->update($validatedUser);
    }

}
