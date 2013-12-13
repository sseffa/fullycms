<?php

class FormPost extends Eloquent {

    public $table = 'form_posts';
    public $fillable = ['sender_name_surname', 'sender_email', 'sender_phone_number', 'subject', 'post'];

    /**
     * Get unanswered messages count
     * @return int
     */
    public static function getUnansweredMessageCount() {

        $formPostCount = Cache::get('formPostCount', function () {

            $count = FormPost::where('is_answered', 0)->count();
            Cache::forever('formPostCount', $count);
            return $count;
        });

        return $formPostCount;
    }
}
