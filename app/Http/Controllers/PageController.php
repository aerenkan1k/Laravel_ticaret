<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyCustomMail; 
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function contact(){
        return view('contact');
    }
    public function sendEmail()
{
    $email = 'recipient@example.com'; // Alıcı e-posta adresi
    $name = 'John Doe'; // Alıcının adı
    $phone = '555-1234'; // Telefon numarası
    $subject = 'Konu Başlığı'; // E-posta konusu
    $message = 'Merhaba, bu bir test e-postasıdır.'; // E-posta içeriği

    Mail::to($email)->send(new MyCustomMail($name, $phone, $subject, $message));
    return "E-posta gönderildi!";
}
}
