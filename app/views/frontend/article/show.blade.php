@extends('frontend/layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ $article->title }}</small></h1>
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Blog Post</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <hr>
            <p><i class="icon-time"></i> Posted on {{ $article->created_at }} by <a href="www.sefakaragoz.com">Sefa</a>
            </p>
            <hr>
            <img src="http://placehold.it/900x300" class="img-responsive">
            <hr>
            <p class="lead">{{ $article->content }}</p>
        </div>
        <div class="col-lg-4">
            <div class="well">
                <h4>Blog Search</h4>

                <div class="input-group">
                    <input type="text" class="form-control">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button"><i class="icon-search"></i></button>
              </span>
                </div>
            </div>
            <div class="well">
                <h4>Popular Blog Categories</h4>

                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#php">PHP</a></li>
                            <li><a href="#laravel">Laravel</a></li>
                            <li><a href="#mysql">Mysql</a></li>
                            <li><a href="#bootstrap">Bootstrap</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#csharp">C#</a></li>
                            <li><a href="#html">HTML</a></li>
                            <li><a href="#css">CSS</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="well">
                <p>Lorem Lipsum</p>
            </div>
        </div>
    </div>
</div>
@stop