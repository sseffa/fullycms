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

<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Video</h1>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
            </div>
            <div class="col-sm-6">
                @yield('partial/breadcrumbs', Breadcrumbs::render('video.show', $video))
            </div>
        </div>
    </div>
</section><!--/#title-->
<style>
.video-container {
    position: relative;
    padding-bottom: 56.25%;
    padding-top: 30px; height: 0; overflow: hidden;

}

.video-container iframe,
.video-container object,
.video-container embed {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
     padding-left: 10px;
        padding-right: 10px;
}
</style>
<section id="video" class="container">

    <div style="text-align: center" class="row">
        <div class="video-container">
        @if($video->type == 'youtube')
            <iframe width="853" height="480" src="http://www.youtube.com/embed/{!! $video->video_id !!}?autoplay=1" frameborder="0" allowfullscreen></iframe>
        @else
          <iframe width="853" height="480" src="http://player.vimeo.com/video/{!! $video->video_id !!}?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff&amp;autoplay=1" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
        @endif
        </div>
    </div>
    <div class="box-detail">
        <h5 class="heading">
            <a href="{!! URL::route('dashboard.video.show', array('id'=>$video->id)) !!}">{!! $video->title !!}</a>
        </h5>
        <ul class="list-inline gallery-details">
            <li>by <a href="#">{!! $video['details']['uploader'] !!}</a></li>
            <li style="display:inline-table" class="pull-right">
                <i class="fa fa-eye fa-fw"></i>&nbsp;{!! $video['details']['view_count'] !!}&nbsp;<i class="fa fa-chevron-circle-up fa-fw"></i>{!! $video['details']['like_count'] !!}&nbsp;<i class="fa fa-comments fa-fw"></i> {!! $video['details']['comment_count'] !!}
            </li>
        </ul>
    </div>

</section><!--#video-->
<script type="text/javascript">

    $(document).ready(function () {
        $(".various").fancybox({
            maxWidth: 800,
            maxHeight: 600,
            fitToView: false,
            width: '70%',
            height: '70%',
            autoSize: false,
            closeClick: false,
            openEffect: 'none',
            closeEffect: 'none'
        });
    });

    // image lazy load
    $(function () {
        $("img.lazy").lazyload({
            effect: "fadeIn"
        });
    });
</script>
@stop


