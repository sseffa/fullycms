<?php

class FormPost extends Eloquent {

    public $table = 'form_posts';
    public $fillable = ['sender_name_surname', 'sender_email', 'sender_phone_number', 'subject', 'message'];
}
