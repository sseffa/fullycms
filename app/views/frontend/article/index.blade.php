@extends('frontend/layout')
@section('content')
<div class="container">

    <div class="row">

        <div class="col-lg-12">
            <h1 class="page-header">Blog</h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Blog</li>
            </ol>
        </div>

    </div>

    @foreach( $articles as $article )
    <div class="row">
        <div class="col-md-1">
            <p><i class="icon-file-text icon-4x"></i></p>

            <p>{{ $article->created_at }}</p>
        </div>
        <div class="col-md-5">
            <a href="#"><img src="http://placehold.it/600x300" class="img-responsive"></a>
        </div>
        <div class="col-md-6">
            <h3><a href="blog-post.html">{{ $article->title }}</a></h3>

            <p>by <a href="#">Sefa</a></p>

            <p>{{{ mb_substr(strip_tags($article->content),0,250) }}}</p>
            {{ link_to_route( 'dashboard.article.show', 'Read More', $article->id, array( 'class' => 'btn btn-primary' )) }}
        </div>
    </div>
    <hr>
    @endforeach
    <div class="row">
        <ul class="pager">
            <li class="previous"><a href="#">&larr; Older</a></li>
            <li class="next"><a href="#">Newer &rarr;</a></li>
        </ul>
    </div>
</div>
@stop