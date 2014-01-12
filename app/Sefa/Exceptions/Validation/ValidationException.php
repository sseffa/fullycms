<?php namespace Sefa\Exceptions\Validation;

use Exception;

class ValidationException extends Exception {

    protected $errors;

    public function __construct($message, $errors, $code = 0, Exception $previous = null) {

        $this->errors = $errors;

        parent::__construct($message, $code, $previous);
    }

    /**
     * Get error messages
     * @return int
     */
    public function getErrors() {

        return $this->errors;
    }
}