@extends('backend/layout')
@section('content')
{{ HTML::style('/ckeditor/contents.css') }}
<div class="container">
    <div class="page-header">
        <h3>
            Photo Gallery Info
            <div class="pull-right">
                <button class="btn btn-primary" type="submit">Back</button>
            </div>
        </h3>
    </div>
    <h5><b>Title: </b>{{ $photo_gallery->title }}</h5>
    <h5><b>Content: </b> {{ $photo_gallery->content }}</h5>
    <h5><b>Created: </b> {{ $photo_gallery->created_at }}</h5>
    <h5><b>Updated: </b> {{ $photo_gallery->updated_at }}</h5>
</div>
@stop