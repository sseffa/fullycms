<?php

namespace Fully\Composers;

use Fully\Models\Setting;
use Fully\Repositories\Setting\SettingInterface;

/**
 * Class SettingComposer.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class SettingComposer
{
    /**
     * @var \Fully\Repositories\Setting\SettingInterface
     */
    protected $setting;

    /**
     * @param SettingInterface $setting
     */
    public function __construct(SettingInterface $setting)
    {
        $this->setting = $setting;
    }

    /**
     * @param $view
     */
    public function compose($view)
    {
        $settings = $this->setting->getSettings();
        $view->with('settings', $settings);
    }
}
