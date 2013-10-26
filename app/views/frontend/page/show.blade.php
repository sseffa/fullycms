@extends('frontend/layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ $page->title }}</small></h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Page</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <hr>
            <img src="http://placehold.it/900x300" class="img-responsive">
            <hr>
            <p class="lead">{{ $page->content }}</p>
        </div>
    </div>
</div>
@stop