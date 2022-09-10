<?php

namespace App\Services;

use App\Mail\MakeOrderEmail;
use App\Mail\WasRegisteredEmail;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailService
{
    protected UserRepository $user;

    public function __construct(UserRepository $userRepository) {
        $this->user = $userRepository;
    }
    public function unsubscribe($userId) {
        $dataToUpdate = [
            'id' => $userId,
            'notification' => 0
        ];

        return $this->user->update($dataToUpdate);
    }

    public function wasRegistered($email): bool
    {
        if (!$this->checkAuth()) {
            return false;
        }
        Mail::to($email)->send(new WasRegisteredEmail());
        return true;
    }

    public function makeOrder($order): bool
    {
        if (!isset($order)) {
            return false;
        }
        Mail::to($order->email)->send(new MakeOrderEmail($order));
        return true;
    }

    private function checkAuth(): bool
    {
        return Auth::check();
    }
}
