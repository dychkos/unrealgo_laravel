<?php

namespace App\Http\Controllers;

use App\Services\MailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    protected MailService $mailService;

    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }

    public function unsubscribe() {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $this->mailService->unsubscribe($userId);
            return view('additional.unsubscribe-email');
        }
        return redirect()->route('login.login');
    }
}
