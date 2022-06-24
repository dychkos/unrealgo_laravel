<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function update($userData)
    {
        $user = new $this->user;
        $user = $user->find($userData['id']);

        if (!empty($userData['role_id'])){
            $user->role_id = $userData['role_id'];
        }

        if (!empty($userData['password'])){
            $userData['password'] = Hash::make($userData['password']);
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

    public function delete($userID): int
    {
        $user = $this->user;
        return $user->destroy($userID);
    }

    public function changeRole($data) {
        $user = User::find($data['user_id']);
        $user->role_id = $data['role_id'];
        $user->save();

        return $user;
    }

    public function clearLiked($user_id): bool
    {
        $user = $this->user->find($user_id);
        $user->likedProducts()->sync([]);

        return true;
    }

    public function toggleStatus($user_id) {
        $user = $this->user::find($user_id);
        $user->status = !$user->status;
        $user->save();

        return $user->status;
    }
}
