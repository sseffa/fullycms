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

Breadcrumbs::register('photo_gallery.show', function ($breadcrumbs, $photo_gallery) {

    $breadcrumbs->parent('home');
    $breadcrumbs->push($photo_gallery->title, route('dashboard.photo_gallery.show', array($photo_gallery->id, $photo_gallery->slug)));
});

Breadcrumbs::register('video', function ($breadcrumbs) {

    $breadcrumbs->parent('home');
    $breadcrumbs->push('Video', route('dashboard.video'));
});

Breadcrumbs::register('video.show', function ($breadcrumbs, $video) {

    $breadcrumbs->parent('video');
    $breadcrumbs->push($video->title, route('dashboard.video.show', $video->id));
});


Breadcrumbs::register('project', function ($breadcrumbs) {

    $breadcrumbs->parent('home');
    $breadcrumbs->push('Project', route('dashboard.project'));
});

Breadcrumbs::register('project.show', function ($breadcrumbs, $project) {

    $breadcrumbs->parent('project');
    $breadcrumbs->push($project->title, route('dashboard.project.show', $project->id));
});