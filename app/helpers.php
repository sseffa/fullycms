<?php

/**
 * Get unanswered messages count
 * @return int
 */
function getUnansweredMessageCount() {

    return FormPost::where('is_answered', 0)->count();
}