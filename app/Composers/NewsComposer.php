<?php namespace Fully\Composers;

use News;
use Fully\Repositories\News\NewsInterface;

/**
 * Class MenuComposer
 * @package Fully\Composers
 * @author Sefa Karagöz
 */
class NewsComposer {

    /**
     * @var \Fully\Repositories\News\NewsInterface
     */
    protected $news;

    /**
     * @param ArticleInterface $article
     */
    public function __construct(NewsInterface $news) {

        $this->news = $news;
    }

    /**
     * @param $view
     */
    public function compose($view) {

        $news = $this->news->getLastNews(5);
        $view->with('news', $news);
    }
}

