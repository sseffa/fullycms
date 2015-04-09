@extends('frontend/layout/layout')
@section('content')
{!! HTML::script('assets/js/moment-with-langs.min.js') !!}
<script type="text/javascript">
    moment().format();
    moment.lang('en');

    jQuery(document).ready(function ($) {
        var now = moment();
        $('.time').each(function (i, e) {
            var time = moment($(e).attr('datetime'));
            $(e).text(time.from(now));

        });
    });
</script>

<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>News</h1>

                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
            </div>
            <div class="col-sm-6">
                @yield('partial/breadcrumbs', Breadcrumbs::render('news', $news))
            </div>
        </div>
    </div>
</section><!--/#title-->

<section class="container">
    <div class="row">
       @include('frontend/news/sidebar')
        <div class="col-sm-8 col-sm-pull-4">
            @foreach( $news as $v )
            <div class="row">
                <div class="col-sm-12">
                    <a href="{!! URL::route('dashboard.news.show', array('slug'=>$v->slug)) !!}">
                        <h4>{!! $v->title !!}</h4>&nbsp;&nbsp;&nbsp;<span datetime="{!! $v->created_at !!}" class="label label-default label-arrow label-arrow-left time"></span>
                    </a>
                    <hr>
                </div>
                <div class="col-sm-4">
                    @if($v->path)
                        <img src="{!! url($v->path) !!}" class="img-square center-block" style="border: 5px solid #bdc3c7;">
                    @else
                        <img src="{!! url('assets/images/news_thumb.png') !!}" style="border: 5px solid #bdc3c7;" class="img-square center-block" width="240" height="150">
                    @endif
                </div>
                <div class="col-sm-8">
                    <p>{!! mb_substr(strip_tags($v->content),0,500) !!}...</p>
                </div>
                <div style="clear: both"></div>
                <p>
                    <a style="float: right" href="{!! URL::route('dashboard.news.show', array('slug'=>$v->slug)) !!}" class="btn btn-xs btn-primary">Read More</a>
                </p>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
    <div class="pull-left">
        <ul class="pagination">
            {!! $news->render() !!}
        </ul>
    </div>
</section>
@stop

