@extends('frontend/layout')
@section('content')
{{ HTML::style('/ckeditor/contents.css') }}
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><small>{{ $page->title }}</small></h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Page</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <p class="lead">{{ $page->content }}</p>
        </div>
    </div>
</div>
@stop