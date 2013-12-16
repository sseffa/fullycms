@extends('frontend/_layout/layout')
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
<div style="margin-bottom: 50px;" class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">News</h1>
            @yield('partial/breadcrumbs', Breadcrumbs::render('news', $news))
        </div>
    </div>
    <div class="col-md-12">

        <div class="row">

            @foreach( $news as $v )
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{ URL::route('dashboard.news.show', array('id'=>$v->id, 'slug'=>$v->slug)) }}">
                        <h4>{{ $v->title }}<span datetime="{{ $v->created_at }}" class="label label-default label-arrow label-arrow-left time">sefa</span>
                        </h4></a>
                    <hr>
                </div>
                <div class="col-sm-4">
                    <img src="//placehold.it/350x350" class="img-square center-block">
                </div>
                <div class="col-sm-8">
                    <p>{{{ mb_substr(strip_tags($v->content),0,2000) }}}</p>
                </div>
                 <div style="clear: both"></div>
                    <p>
                        <a style="float: right" href="{{ URL::route('dashboard.news.show', array('id'=>$v->id, 'slug'=>$v->slug)) }}" class="btn btn-xs btn-primary">Read More</a>
                    </p>
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

