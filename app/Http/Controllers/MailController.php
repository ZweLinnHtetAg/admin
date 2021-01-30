<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class MailController extends Controller
{
    public function index()
    {
        return view('mail.index');
    }

    public function send(Request $request)
    {
        $data = array(
            'name'=>"Virat Gandhi",
            'mailTo' => $request->email,
            'subject' => $request->subject,
        );

          Mail::send('mail', $data, function($message) use ($request){
             $message->to($request->email, $request->name)->subject
            ($request->subject);
            $message->from('testing@gmail.com','Admin Panel');
          });
        
    }
}
