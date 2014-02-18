@extends('frontend/_layout/layout')
@section('content')
{{ HTML::style('ckeditor/contents.css') }}
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><small>{{ e($page->title) }}</small></h1>
            @yield('partial/breadcrumbs', Breadcrumbs::render('page.show', $page))
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <p>{{ $page->content }}</p>
        </div>
    </div>
</div>
@stop
