<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;
use App\Mail\MailNotify;
use App\Mail\SendEmailRegister;
use Illuminate\Support\Facades\Mail;

class SendMailController extends BaseController
{
    public function sendMail()
    {

        Mail::to('nguyenhoang080721@gmail.com')->send(new SendEmailRegister());
        return response()->json(['Great! Successfully send in your mail']);
        // try {
        // } catch (\Throwable $e) {
        //     return response()->json(['Sorry']);
        // }
    }
}
