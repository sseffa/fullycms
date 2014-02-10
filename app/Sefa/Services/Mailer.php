<?php namespace Sefa\Services;

use Mail;
use Sefa\Services\MailInterface;

class Mailer implements MailInterface {

    public function send($view, $email, $subject, $data = array()) {

        Mail::send($view, $data, function ($message) use ($email, $subject) {

            $message->from('noreply@sfcms.com');
            $message->to($email)->subject($subject);
        });
    }

    public function queue($view, $email, $subject, $data = array()) {

        Mail::queue($view, $data, function ($message) use ($email, $subject) {

            $message->from('noreply@sfcms.com');
            $message->to($email)->subject($subject);
        });
    }
}
