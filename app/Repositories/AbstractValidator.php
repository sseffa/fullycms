<?php

namespace Fully\Repositories;

use Validator as V;

/**
 * Class AbstractValidator.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
abstract class AbstractValidator
{
    /**
     * @var
     */
    protected $errors;

    /**
     * Check valid attributes.
     *
     * @param array $attributes
     * @param array $rules
     *
     * @return bool
     */
    public function isValid(array $attributes, array $rules = null)
    {
        $v = V::make($attributes, ($rules) ? $rules : static::$rules);

        if ($v->fails()) {
            $this->setErrors($v->messages());

            return false;
        }

        return true;
    }

    /**
     * Get validation error messages.
     *
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Set validation error messages.
     *
     * @param $error
     */
    public function setErrors($error)
    {
        $this->errors = $error;
    }
}
