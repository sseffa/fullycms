<?php namespace Sefa\Providers;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider {

    public function register() {

        $this->app->bind(
            'Sefa\Repositories\BaseRepositoryInterface',
            'Sefa\Repositories\Article\ArticleRepository',
            'Sefa\Repositories\Category\CategoryRepository',
            'Sefa\Repositories\News\NewsRepository',
            'Sefa\Repositories\Page\PageRepository',
            'Sefa\Repositories\PhotoGallery\PhotoGalleryRepository',
            'Sefa\Repositories\Tag\TagRepository'
        );
    }
}
