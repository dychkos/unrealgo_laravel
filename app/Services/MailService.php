<?php

namespace App\Services;

use App\Mail\DeclinedOrderMail;
use App\Mail\MakeOrderEmail;
use App\Mail\SentOrderMail;
use App\Mail\WasRegisteredEmail;
use App\Models\Order;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
        $this->sendMail($email, new WasRegisteredEmail());
        return true;
    }

    public function makeOrder($order): bool
    {
        if (!isset($order)) {
            return false;
        }
        $this->sendMail($order->email, new MakeOrderEmail($order));
        return true;
    }

    public function sentOrder($order): bool
    {
        if (!isset($order)) {
            return false;
        }
        $this->sendMail($order->email, new SentOrderMail($order));
        return true;
    }

    public function cancelOrder(Order $order): bool
    {
        if (!isset($order)) {
            return false;
        }
        $this->sendMail($order->email, new DeclinedOrderMail($order));
        return true;
    }

    private function checkAuth(): bool
    {
        return Auth::check();
    }

    private function sendMail(string $email, Mailable $mailBody): void
    {
        try {
            Mail::to($email)->send($mailBody);
        } catch (Exception $exception) {
            Log::error('EMAIL NOT SENT ' . $exception->getMessage());
        }
    }
}
