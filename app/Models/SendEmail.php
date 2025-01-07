<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mail;


class SendEmail extends Model
{
    public static function sendEmail($Sender,$SenderId,$MessageToSend,$SubscriberName,$SubscriberId,$Subject){
        $data = array(
            'content'=>$MessageToSend,
            'subject'=>$Subject,
        );
        $Sendto="info@trustedtouchnursing.co.ke";
        $SendToName ="Trusted Touch Nursing";

        Mail::send('mailTheme', $data, function($message) use ($Subject,$Sender,$SenderId,$SubscriberId,$SubscriberName,$Sendto,$SendToName){
            $message->from($Sender , $SenderId);
            $message->to($Sendto, $SendToName)->cc('albertmuhatia@gmail.com')->replyto($Sender)->subject($Subject);
        });
    }
}
