<?php namespace Fully\Repositories\Setting;

use Fully\Services\Cache\CacheInterface;
use Fully\Repositories\Setting\AbstractSettingDecorator;

/**
 * Class CacheDecorator
 * @package Fully\Repositories\Setting
 * @author Sefa Karagöz
 */
class CacheDecorator extends AbstractSettingDecorator {

    /**
     * @var \Fully\Services\Cache\CacheInterface
     */
    protected $cache;

    /**
     * Cache key
     * @var string
     */
    protected $cacheKey = "setting";

    /**
     * @param SettingInterface $setting
     * @param CacheInterface $cache
     */
    public function __construct(SettingInterface $setting, CacheInterface $cache) {

        parent::__construct($setting);
        $this->cache = $cache;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getSettings() {

        $key = md5(getLang() . $this->cacheKey . 'settings');

        if ($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        $setting = $this->setting->getSettings();

        $this->cache->put($key, $setting);

        return $setting;
    }
}