<?php namespace Sefa;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider {

    public function register() {

        $this->app->bind(
            'Sefa\Repository\BaseRepositoryInterface',
            'Sefa\Repository\Article\ArticleRepository',
            'Sefa\Repository\Category\CategoryRepository',
            'Sefa\Repository\News\NewsRepository',
            'Sefa\Repository\Page\PageRepository',
            'Sefa\Repository\PhotoGallery\PhotoGalleryRepository',
            'Sefa\Repository\Tag\TagRepository'
        );
    }
}