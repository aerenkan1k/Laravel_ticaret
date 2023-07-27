<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $data = [
            'subject' => $request->input('subject'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ];

        Mail::to('erenkanik@hotmail.com')->send(new ContactFormMail($data));

        return "E-posta başarıyla gönderildi!";
    }
}
