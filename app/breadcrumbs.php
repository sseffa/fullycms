<?php

Breadcrumbs::register('home', function ($breadcrumbs) {

    $breadcrumbs->push('Home', route('dashboard'));
});

Breadcrumbs::register('blog', function ($breadcrumbs) {

    $breadcrumbs->parent('home');
    $breadcrumbs->push('Blog', route('dashboard.article'));
});

Breadcrumbs::register('blog.post.show', function ($breadcrumbs, $article) {

    $breadcrumbs->parent('blog');
    $breadcrumbs->push($article->title, route('dashboard.article.show', array($article->id, $article->slug)));
});

Breadcrumbs::register('page.show', function ($breadcrumbs, $page) {

    $breadcrumbs->parent('home');
    $breadcrumbs->push($page->title, route('dashboard.page.show', $page->id));
});

Breadcrumbs::register('contact', function ($breadcrumbs) {

    $breadcrumbs->parent('home');
    $breadcrumbs->push('Contact', route('dashboard.contact'));
});

Breadcrumbs::register('news', function ($breadcrumbs) {

    $breadcrumbs->parent('home');
    $breadcrumbs->push('News', route('dashboard.news'));
});

Breadcrumbs::register('news.show', function ($breadcrumbs, $news) {

    $breadcrumbs->parent('news');
    $breadcrumbs->push($news->title, route('dashboard.news.show', array($news->id, $news->slug)));
});