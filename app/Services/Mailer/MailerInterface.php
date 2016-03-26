<?php

namespace Fully\Services;

/**
 * Class MailInterface.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
interface MailerInterface
{
    public function send($view, $email, $subject, $data = array());
    public function queue($view, $email, $subject, $data = array());
}
