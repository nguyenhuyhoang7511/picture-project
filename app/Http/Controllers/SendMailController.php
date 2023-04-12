<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendEmailRegister;
use Illuminate\Support\Facades\Mail;

class SendMailController extends BaseController
{
    public function sendMail()
    {
        try {
            $data = ['message' => 'This is a test!'];
            Mail::to('hoangit230821@gmail.com')->send(new SendEmailRegister($data));
            return response()->json(['Send email modify success']);
        } catch (\Throwable $e) {
            return response()->json(['Send email modify fail']);
        }
    }
}
