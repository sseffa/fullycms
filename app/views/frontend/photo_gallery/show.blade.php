@extends('frontend/layout')
@section('content')
{{ HTML::style('/ckeditor/contents.css') }}
{{ HTML::style('/fancybox/css/jquery.fancybox.css') }}
{{ HTML::style('/fancybox/css/jquery.fancybox-buttons.css') }}
{{ HTML::style('/fancybox/css/jquery.fancybox-thumbs.css') }}
{{ HTML::script('/fancybox/js/jquery.mousewheel-3.0.6.pack.js') }}
{{ HTML::script('/fancybox/js/jquery.fancybox.pack.js') }}
{{ HTML::script('/fancybox/js/jquery.fancybox-buttons.js') }}
{{ HTML::script('/fancybox/js/jquery.fancybox-media.js') }}
{{ HTML::script('/fancybox/js/jquery.fancybox-thumbs.js') }}
<script type="text/javascript">
    $(document).ready(function () {
        $(".fancybox").fancybox();
    });
</script>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <small>{{ $photo_gallery->title }}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Photo Gallery</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <p class="lead">{{ $photo_gallery->content }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h4>Images</h4>
            @foreach($photos as $photo)
            <a rel="group" class="fancybox" href="{{ url($photo->path) }}" title="{{ $photo->title }}"><img style="border-radius: 20px;" class="left" src="{{ url('uploads/150x150_' . $photo->file_name) }}"/></a>
            @endforeach
        </div>
    </div>
</div>
@stop