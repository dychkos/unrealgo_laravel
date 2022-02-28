<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthRepository
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register($userData)
    {
        $user = new $this->user;
        return $user->create([
            'name' => $userData['name'],
            'role_id' => $userData['role_id'] ?? 1,
            'email' => $userData['email'],
            'status' => 1,
            'password' => Hash::make($userData['password']),
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function login($credentials,$remember){
        $user = $this->user->where('email',$credentials['email'])->first();
        if($user){
            if(!auth()->attempt($credentials,$remember)){
                throw ValidationException::withMessages(['email' => "Неправильный логин или пароль"]);
            }
            else{
                return $user;
            }
        }
        else{
            throw ValidationException::withMessages(['email' => "Пользователь с таким email не существует"]);
        }
    }

    public function update($userData)
    {
        $user = new $this->user;
        $user = $user->find($userData['id']);

        if (!empty($userData['role_id'])){
            $user->role_id = $userData['role_id'];
        }

        if(!empty($userData["image"])){
            if($user->image()->get()->isNotEmpty()){
                $user->image()->delete();
            }
            $user->image()->create($userData['image'][0]);
        }

        $user->update($userData);
        return $user->fresh();
    }

    public function checkEmailExists($email): bool
    {
        $user = new $this->user;
        return $user->whereEmail($email)->count() > 0;
    }

    public function delete($user_id){
        $user = new $this->user;
        return $user->destroy($user_id);
    }


}
