<?php namespace Fully\Repositories\Setting;

use Fully\Repositories\Setting\SettingInterface;

/**
 * Class AbstractSettingDecorator
 * @package Fully\Repositories\Setting
 * @author Sefa Karagöz
 */
abstract class AbstractSettingDecorator implements SettingInterface {

    /**
     * @var SettingInterface
     */
    protected $setting;

    /**
     * @param SettingInterface $setting
     */
    public function __construct(SettingInterface $setting) {

        $this->setting = $setting;
    }

    /**
     * @return mixed
     */
    public function getSettings() {

        return $this->setting->getSettings();
    }
}