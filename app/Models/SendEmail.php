<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mail;

class SendEmail extends Model
{
    public static function sendEmail($Sender, $SenderId, $MessageToSend, $SubscriberName, $SubscriberId, $Subject)
    {
        $data = [
            'content' => $MessageToSend,
            'subject' => $Subject,
            'name' => $SubscriberName,
            'email' => $SubscriberId,
        ];

        $Sendto = setting('mail_to', 'info@trustedtouchnursing.co.ke');
        $SendToName = setting('mail_to_name', 'Trusted Touch Nursing');
        $bcc = setting('mail_bcc');

        Mail::send('mailTheme', $data, function ($message) use ($Subject, $Sender, $SenderId, $SubscriberId, $Sendto, $SendToName, $bcc) {
            $message->from($Sender, $SenderId);
            $mail = $message->to($Sendto, $SendToName)->replyTo($SubscriberId)->subject($Subject);
            if ($bcc) {
                $mail->bcc($bcc);
            }
        });
    }
}
