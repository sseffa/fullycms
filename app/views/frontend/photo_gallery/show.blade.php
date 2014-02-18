@extends('frontend/_layout/layout')
@section('content')
{{ HTML::style('ckeditor/contents.css') }}
{{ HTML::style('fancybox/css/jquery.fancybox.css') }}
{{ HTML::style('fancybox/css/jquery.fancybox-buttons.css') }}
{{ HTML::style('fancybox/css/jquery.fancybox-thumbs.css') }}
{{ HTML::script('fancybox/js/jquery.mousewheel-3.0.6.pack.js') }}
{{ HTML::script('fancybox/js/jquery.fancybox.pack.js') }}
{{ HTML::script('fancybox/js/jquery.fancybox-buttons.js') }}
{{ HTML::script('fancybox/js/jquery.fancybox-media.js') }}
{{ HTML::script('fancybox/js/jquery.fancybox-thumbs.js') }}
{{ HTML::script('assets/js/jquery.lazyload.min.js') }}
<script type="text/javascript">
    // fancybox
    $(document).ready(function () {
        $(".fancybox").fancybox();
    });

    // image lazy load
    $(function () {
        $("img.lazy").lazyload({
            effect: "fadeIn"
        });
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
            <p>{{ $photo_gallery->content }}</p>
        </div>
    </div>
    @if($photo_gallery->photos->count())
    <div class="row">
        <div class="col-lg-12">
            @foreach($photo_gallery->photos as $photo)
            <a rel="group" class="fancybox" href="{{ url($photo->path) }}" title="{{ $photo->title }}">
                <img style="border-radius: 20px;" class="lazy left" data-original="{{ url('uploads/dropzone/thumb_' . $photo->file_name) }}"/>
            </a>
            @endforeach
        </div>
    </div>
    @endif
</div>
@stop
