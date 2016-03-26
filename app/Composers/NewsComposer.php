<?php

namespace Fully\Composers;

use News;
use Fully\Repositories\News\NewsInterface;

/**
 * Class MenuComposer.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class NewsComposer
{
    /**
     * @var \Fully\Repositories\News\NewsInterface
     */
    protected $news;

    /**
     * NewsComposer constructor.
     * @param NewsInterface $news
     */
    public function __construct(NewsInterface $news)
    {
        $this->news = $news;
    }

    /**
     * @param $view
     */
    public function compose($view)
    {
        $news = $this->news->getLastNews(5);
        $view->with('news', $news);
    }
}
