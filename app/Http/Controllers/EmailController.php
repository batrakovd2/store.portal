<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send(Request $request)
    {
        $name = $request->input('name');
        $phone = $request->input('tel');
        $modalPhone = $request->input('phone');
        $email = $request->input('mail');
        $question = $request->input('quest');
        $orderQuantity = $request->input('orderQuantity');

        $company = Company::first();
        if ($company && $company->email) {
            $mail_to = $company->email;
//            dd($mail_to, $name, $phone, $email);
            if ($name && $phone && $email) {
                Mail::send('templates.'.$this->template.'.email.contacts', [
                    'name' => $name,
                    'phone' => $phone,
                    'email' => $email
                ],
                    function ($message) use ($name, $email, $mail_to) {
                        $message->from('info@v-assortimente.ru', $email);
                        $message->to($mail_to)->subject('Обратная связь от ' . $name);
                    });
                return 1;
            }
        }


    }
}
