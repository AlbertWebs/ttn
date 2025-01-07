<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SendEmail;
use Redirect;

class HomeController extends Controller
{
    public function send(Request $request){
        if($request->verify_contact == $request->verify_contact_input){
            $name = $request->name;
            $email = $request->email;
            $massage = $request->massage;

            $Sender = "noreply@trustedtouchnursing.co.ke";
            $SenderId = "No Reply";
            $MessageToSubscriber = $massage ;
            $SubscriberName = $request->name;
            $SubscriberId = $request->email;
            $subject = "TTN Website Inquiry";
            SendEmail::sendEmail($Sender,$SenderId,$MessageToSubscriber,$SubscriberName,$SubscriberId,$subject);

            return view('thank');
        }else{
            return Redirect::back();
        }


    }

}
