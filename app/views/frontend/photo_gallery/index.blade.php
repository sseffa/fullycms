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
    @foreach( $pages as $page )
    <div class="row">
        <div class="col-md-1">
            <p><i class="icon-file-text icon-4x"></i></p>

            <p>{{ $page->created_at }}</p>
        </div>
        <div class="col-md-5">
            <a href="#"><img src="http://placehold.it/600x300" class="img-responsive"></a>
        </div>
        <div class="col-md-6">
            <h3><a href="blog-post.html">{{ $page->title }}</a></h3>

            <p>by <a href="#">Sefa</a></p>

            <p>{{ mb_substr(strip_tags($page->content),0,300) }}</p>
            {{ link_to_route( 'dashboard.page.show', 'Read More', $page->id, array( 'class' => 'btn btn-primary' )) }}
        </div>
    </div>
    <hr>
    @endforeach
    <div class="row">

    </div>
</div>
@stop