<?php

namespace App\Http\Controllers;

use App\Mail\ContactMe;
use App\Notifications\PaymentReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        return view('mail.mail');
    }

    public function sendMail()
    {
        request()->validate([
            'email' =>  'required|email'
        ]);

        Notification::send(request()->user(), new PaymentReceived);

        return redirect('mail')
            ->with('message', 'Your payment has been received !');
    }
}
