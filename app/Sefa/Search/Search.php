<?php namespace Sefa\Search;

use News;
use Article;
use PhotoGallery;

class Search {

    public function search($search) {

        $newsResult = News::search($search)->get()->toArray();
        $articleResult = Article::search($search)->get()->toArray();
        $photoGalleryResult = PhotoGallery::search($search)->get()->toArray();
        $result = array_merge($newsResult, $articleResult, $photoGalleryResult);
        return $result;
    }
}
