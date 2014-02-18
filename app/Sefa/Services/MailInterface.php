<?php namespace Sefa\Services;

interface MailInterface {

    public function send($view, $email, $subject, $data = array());
    public function queue($view, $email, $subject, $data = array());
}

