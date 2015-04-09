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
<style>
    .box-detail a {
        font-weight: bold;
    }

    .box-detail a:visited {
        color: #e74c3c;
    }

    .box-detail ul {
        margin-top: -5px;
    }

    .box-detail ul li {
        color: #999;
        font-size: 11px;
        font-weight: normal;
    }

    .box-detail ul li a {
        color: #999;
        font-size: 11px;
        font-weight: normal;
    }
</style>
<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Videos</h1>
            </div>
            <div class="col-sm-6">
                @yield('partial/breadcrumbs', Breadcrumbs::render('video', $videos))
            </div>
        </div>
    </div>
</section><!--/#title-->

<section class="container">

    @foreach(array_chunk($videos->getCollection()->all(), 4) as $row)
    <div class="row">
        @foreach($row as $item)

        <article class="col-md-3">
            @if($item->type == 'youtube')
            <a class="various fancybox.iframe" href="http://www.youtube.com/embed/{!! $item->video_id !!}?autoplay=1">
                <img style="width: 100%; height: 100%" class="video-resim" src="{!! url($item->details['thumbnail_large']) !!}" alt="thumb"/>
            </a>
            @else
            <a class="various fancybox.iframe" href="http://player.vimeo.com/video/{!! $item->video_id !!}?title=0&amp;autoplay=1">
                <img style="width: 100%; height: 100%" class="video-resim" src="{!! url($item->details['thumbnail_large']) !!}" alt="thumb"/>
            </a>
            @endif
            <div class="box-detail">
                <h5 class="heading">
                    <a href="{!! URL::route('dashboard.video.show', array('slug'=>$item->slug)) !!}">{!! $item->title !!}</a>
                </h5>
                <ul class="list-inline gallery-details">
                    <li>by <a href="#">{!! $item['details']['uploader'] !!}</a></li>
                    <li style="display:inline-table" class="pull-right">
                        <i class="fa fa-eye fa-fw"></i>&nbsp;{!! $item['details']['view_count'] !!}&nbsp;<i class="fa fa-chevron-circle-up fa-fw"></i>{!! $item['details']['like_count'] !!}&nbsp;<i class="fa fa-comments fa-fw"></i> {!! $item['details']['comment_count'] !!}
                    </li>
                </ul>
            </div>
        </article>
        @endforeach
    </div>
    @endforeach
    <br>
    <br>
    <br>
    {!! $videos->appends(Request::except('video'))->render() !!}
</section>
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
