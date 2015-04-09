<?php namespace Fully\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FormPost
 * @author Sefa Karagöz
 */
class FormPost extends Model {

    public $table = 'form_posts';
    public $fillable = ['sender_name_surname', 'sender_email', 'sender_phone_number', 'subject', 'message'];
}
