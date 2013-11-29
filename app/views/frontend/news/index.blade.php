@extends('frontend/layout')
@section('content')
{{ HTML::script('assets/js/moment-with-langs.min.js') }}
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
<style>
    pre code {
        diplay: none;
    }
</style>

<style type="text/css">
    .label-arrow {
        position: relative;
        padding: .4em .6em .3em;
    }

    .label-arrow-left {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        margin-left: 10px;
    }

    .label-arrow-left:before {
        right: 100%;
        top: 50%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        border-right-color: #999;
        border-width: 10px;
        margin-top: -10px;
    }

    h4 .label-arrow-left {
        margin-left: 18px;
    }

    h4 .label-arrow-left:before {
        border-width: 13px;
        margin-top: -13px;
    }
</style>

<div style="margin-bottom: 50px;" class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">News</h1>
            @yield('partial/breadcrumbs', Breadcrumbs::render('news', $news))
        </div>
    </div>
    <div class="col-md-11">

        <div class="row">

            @foreach( $news as $v )
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{ URL::route('dashboard.news.show', array('id'=>$v->id, 'slug'=>$v->slug)) }}">
                        <h4>{{ $v->title }}<span datetime="{{ $v->created_at }}" class="label label-default label-arrow label-arrow-left time">sefa</span>
                        </h4></a>
                    <hr>
                </div>
                <div class="col-sm-2">
                    <img src="//placehold.it/75x75" class="img-circle center-block">
                </div>
                <div class="col-sm-10">
                    <p>{{{ mb_substr(strip_tags($v->content),0,600) }}}</p>
                    <p>
                        <a href="{{ URL::route('dashboard.news.show', array('id'=>$v->id, 'slug'=>$v->slug)) }}" class="btn btn-default">Read More</a>
                    </p>
                </div>
            </div>
            <hr>
            @endforeach

        </div>
    </div>
    <div class="pull-left">
        <ul class="pagination">
            {{ $news->links() }}
        </ul>
    </div>
</div>


@stop

