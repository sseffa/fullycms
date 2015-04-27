@extends('frontend/layout/layout')
@section('content')
{!! HTML::style('ckeditor/contents.css') !!}
{!! HTML::style('fancybox/css/jquery.fancybox.css') !!}
{!! HTML::style('fancybox/css/jquery.fancybox-buttons.css') !!}
{!! HTML::style('fancybox/css/jquery.fancybox-thumbs.css') !!}
{!! HTML::script('fancybox/js/jquery.mousewheel-3.0.6.pack.js') !!}
{!! HTML::script('fancybox/js/jquery.fancybox.pack.js') !!}
{!! HTML::script('fancybox/js/jquery.fancybox-buttons.js') !!}
{!! HTML::script('fancybox/js/jquery.fancybox-media.js') !!}
{!! HTML::script('fancybox/js/jquery.fancybox-thumbs.js') !!}
{!! HTML::script('assets/js/jquery.lazyload.min.js') !!}

<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>{!! $photo_gallery->title !!}</h1>
            </div>
            <div class="col-sm-6">
                @yield('partial/breadcrumbs', Breadcrumbs::render('photo_gallery.show', $photo_gallery))
            </div>
        </div>
    </div>
</section><!--/#title-->

<section class="container">

    {!! $photo_gallery->content !!}

    <br>
    <br>
    <br>

    @if($photo_gallery->photos->count())


    @foreach($photo_gallery->photos as $photo)
    <a rel="group" class="fancybox" href="{!! url($photo->path) !!}" title="{!! $photo->title !!}">
        <img style="border-radius: 20px;" class="lazy left" data-original="{!! url('uploads/dropzone/thumb_' . $photo->file_name) !!}"/>
    </a>
    @endforeach

    @endif
</section>
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
@stop
