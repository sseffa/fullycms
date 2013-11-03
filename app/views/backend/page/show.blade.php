@extends('backend/layout')
@section('content')
{{ HTML::style('/ckeditor/contents.css') }}
<div class="container">
    <div class="page-header">
        <h3>
            Page Info
            <div class="pull-right">
                <button class="btn btn-primary" type="submit">Back</button>
            </div>
        </h3>
    </div>
    <h5><b>Title: </b>{{ $page->title }}</h5>
    <h5><b>Content: </b> {{ $page->content }}</h5>
    <h5><b>Created: </b> {{ $page->created_at }}</h5>
    <h5><b>Updated: </b> {{ $page->updated_at }}</h5>
</div>
@stop