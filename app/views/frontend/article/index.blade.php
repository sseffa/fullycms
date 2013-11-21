@extends('frontend/layout')
@section('content')
{{ HTML::script('bootstrap/js/moment-with-langs.min.js') }}
<script type="text/javascript">
    moment().format();
    moment.lang('en');

    jQuery(document).ready(function($){
        var now = moment();
        $('.time').each(function(i, e) {

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

    .label-arrow-right {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        margin-right: 10px;
    }

    .label-arrow-right:after {
        left: 100%;
        top: 50%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        border-left-color: #999;
        border-width: 9px;
        margin-top: -9px;
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

    .label-primary.label-arrow:after {
        border-left-color: #428bca;
    }

    .label-primary.label-arrow:before {
        border-right-color: #428bca;
    }

    .label-success.label-arrow:after {
        border-left-color: #5cb85c;
    }

    .label-success.label-arrow:before {
        border-right-color: #5cb85c;
    }

    .label-warning.label-arrow:after {
        border-left-color: #f0ad4e;
    }

    .label-warning.label-arrow:before {
        border-right-color: #f0ad4e;
    }

    .label-danger.label-arrow:after {
        border-left-color: #d9534f;
    }

    .label-danger.label-arrow:before {
        border-right-color: #d9534f;
    }

    .label-info.label-arrow:after {
        border-left-color: #5bc0de;
    }

    .label-info.label-arrow:before {
        border-right-color: #5bc0de;
    }
</style>

<div style="margin-bottom: 50px;" class="container">
      <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Blog</h1>
            @yield('partial/breadcrumbs', Breadcrumbs::render('blog', $articles))
        </div>
    </div>
    <div class="col-md-11">

        <div class="row">

        @foreach( $articles as $article )
        <div class="row">
            <div class="col-sm-12">
                	<h4>{{ $article->title }}<span datetime="{{ $article->created_at }}" class="label label-default label-arrow label-arrow-left time">sefa</span></h4>
                <hr>
            </div>
            <div class="col-sm-2">
                <img src="//placehold.it/75x75" class="img-circle center-block">
            </div>
            <div class="col-sm-10">
                <p>{{{ mb_substr(strip_tags($article->content),0,600) }}}</p>
                <div class="pull-right">
                    @foreach($article->tags as $tag)
                     <a href="{{ URL::route('dashboard.tag', array('tag'=>$tag->name)) }}"><span class="label label-warning">{{ $tag->name }}</span></a>
                    @endforeach
                </div>
                <p>
                      <a href="{{ URL::route('dashboard.article.show', array('id'=>$article->id, 'slug'=>$article->slug)) }}" class="btn btn-default">Read More</a>
                </p>
            </div>
        </div>
        <hr>
        @endforeach

    </div>
        <div class="pull-left">
        <ul class="pagination">
            {{ $articles->links() }}
        </ul>
    </div>
</div>

@stop

