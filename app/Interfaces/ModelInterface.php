<?php namespace Fully\Interfaces;

/**
 * Class ModelInterface
 * @package Fully\Interfaces
 * @author Sefa Karagöz
 */
interface ModelInterface {

    /**
     * @param $value
     * @return mixed
     */
    public function setUrlAttribute($value);

    /**
     * @return mixed
     */
    public function getUrlAttribute();
}