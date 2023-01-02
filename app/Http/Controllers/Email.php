<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Email extends Controller
{
    public function confirmEmail()
    {
        $patientEmail =

        $email = 'emailtujuan@hotmail.com';
        $data = [
            'title' => 'Selamat datang!',
            'url' => 'https://aantamim.id',
        ];
        Mail::to($email)->send(new SendMail($data));
        return 'Berhasil mengirim email!';
    }
}
