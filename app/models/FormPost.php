<?php

class FormPost extends Eloquent {

    public $table = 'form_posts';

    /**
     * Get unanswered messages count
     * @return int
     */
    public static function getUnansweredMessageCount() {

        return FormPost::where('is_answered', 0)->count();
    }
}
