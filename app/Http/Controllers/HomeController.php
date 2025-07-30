<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SendEmail;
use Redirect;
use Illuminate\Support\Facades\Log;


class HomeController extends Controller
{
    public function send(Request $request){
        if ($request->verify_contact == $request->verify_contact_input) {
        // Log request inputs before sending
        Log::info('Contact form submission received', [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->massage,  // Note: is "massage" a typo of "message"?
            'verify_contact' => $request->verify_contact,
            'verify_contact_input' => $request->verify_contact_input
        ]);

        $name = $request->name;
        $email = $request->email;
        $massage = $request->massage;

        $Sender = "noreply@trustedtouchnursing.co.ke";
        $SenderId = "No Reply";
        $MessageToSubscriber = $massage;
        $SubscriberName = $name;
        $SubscriberId = $email;
        $subject = "TTN Website Inquiry";

        SendEmail::sendEmail($Sender, $SenderId, $MessageToSubscriber, $SubscriberName, $SubscriberId, $subject);

        return view('thank');
    } else {
        Log::warning('Contact form verification failed', [
            'submitted_verify_contact' => $request->verify_contact_input,
            'expected_verify_contact' => $request->verify_contact
        ]);
        return Redirect::back();
    }


    }

}
