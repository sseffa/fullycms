@extends('frontend/layout')
@section('content')
{{ HTML::style('ckeditor/contents.css') }}
{{ HTML::style('assets/css/style.css') }}
<div class="container">
    <div class="row">
        <div class="col-lg12">
            <h1 class="page-header">
                <small>{{ $news->title }}</small>
            </h1>
            @yield('partial/breadcrumbs', Breadcrumbs::render('news.show', $news))
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <p><i class="icon-time"></i> Posted on {{ $news->created_at }} by <a href="www.sefakaragoz.com">Sefa</a>
            </p>
            {{ $news->content }}
        </div>
    </div>
</div>
@stop