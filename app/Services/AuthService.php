<?php


namespace App\Services;

use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Validator;

class AuthService {

    /**
     * @var AuthRepository
     */
    private $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register($userData)
    {
        $authRepository = $this->authRepository;

        $validatedUser = Validator::make($userData,[
            'name' => ["required","string","max:25"],
            'role_id' => ["nullable","integer"],
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) use ($authRepository) {
                    if ($authRepository->checkEmailExists($value)) {
                        $fail('This ' . $attribute. ' is already used.');
                    }
                },
            ],
            'password' => 'min:6|required',
            //'confirm_password' => ['min:6','required']
        ])->validate();

        return $authRepository->register($validatedUser);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login($userData){
        $validated = Validator::make($userData,[
            'email' => 'required|string',
            'password' => 'required|min:6',
        ])->validate();

        $remember = $userData["remember_me"] ?? false;
        $credentials = array("email"=>$validated["email"],"password"=>$validated["password"]);

        return $this->authRepository->login($credentials,$remember);

    }


    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update($userData){
        $authRepository = $this->authRepository;


        $validatedUser = Validator::make($userData,[
            'id' => ["required","integer"],
            'name' => ["required","string","max:25"],
            'image' => ["nullable","array"],
            'role_id' => ["nullable","integer"],
        ])->validate();

        return $authRepository->update($validatedUser);
    }

    public function delete($user_id)
    {
        return $this->authRepository->delete($user_id);
    }


}
