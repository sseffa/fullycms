@extends('backend/layout')
@section('content')
{{ HTML::style('/ckeditor/contents.css') }}
<div class="container">
    <div class="page-header">
        <h3>
            Article Info
            <div class="pull-right">
               {{ HTML::link('/admin/article','Back', array('class'=>'btn btn-primary')) }}
            </div>
        </h3>
    </div>
    <h5><b>Title: </b>{{ $article->title }}</h5>
    <h5><b>Content: </b> {{ $article->content }}</h5>
    <h5><b>Created: </b> {{ $article->created_at }}</h5>
    <h5><b>Updated: </b> {{ $article->updated_at }}</h5>
</div>
@stop
