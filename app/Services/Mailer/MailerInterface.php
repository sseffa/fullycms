<?php namespace Fully\Services;

/**
 * Class MailInterface
 * @package Fully\Services
 * @author Sefa Karagöz
 */
interface MailInterface {

    public function send($view, $email, $subject, $data = array());
    public function queue($view, $email, $subject, $data = array());
}

