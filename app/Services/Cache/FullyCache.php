<?php namespace Fully\Services\Cache;

use Config;
use Illuminate\Cache\CacheManager;

/**
 * Class FullyCache
 * @package Impl\Services
 * @author Sefa Karagöz
 */
class FullyCache implements CacheInterface {

    /**
     * @var \Illuminate\Cache\CacheManager
     */
    protected $cache;

    /**
     * @var string
     */
    protected $tag;

    /**
     * @var integer
     */
    protected $minutes;

    /**
     * @var
     */
    private $cacheDriver;

    /**
     * Construct
     * @param CacheManager $cache
     * @param $tag
     * @param int $minutes
     */
    public function __construct(CacheManager $cache, $tag, $minutes = 60) {

        $this->cache = $cache;
        $this->tag = $tag;
        $this->minutes = $minutes;

        $this->cacheDriver = Config::get('cache.default');
    }

    /**
     * Get
     * @param $key
     * @return mixed
     */
    public function get($key) {

        if ($this->cacheDriver == "file")
            return $this->cache->get($key);

        return $this->cache->tags($this->tag)->get($key);
    }

    /**
     * Put
     * @param $key
     * @param $value
     * @param null $minutes
     * @return mixed
     */
    public function put($key, $value, $minutes = null) {

        if (is_null($minutes)) {
            $minutes = $this->minutes;
        }

        if ($this->cacheDriver == "file")
            return $this->cache->put($key, $value, $minutes);

        return $this->cache->tags($this->tag)->put($key, $value, $minutes);
    }

    /**
     * Has
     * @param $key
     * @return bool
     */
    public function has($key) {

        if ($this->cacheDriver == "file")
            return $this->cache->has($key);

        return $this->cache->tags($this->tag)->has($key);
    }
}