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
            $(e).html('<i class="icon-calendar"> ' + time.from(now) + '</i>');

        });
    });
</script>

<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Category</h1>

                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
            </div>
            <div class="col-sm-6">

                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active"></li>
                </ol>
            </div>
        </div>
    </div>
</section><!--/#title-->

<section id="blog" class="container">
    <div class="row">
    @include('frontend/article/sidebar', array($tags, $categories))
        <div class="col-sm-8 col-sm-pull-4">
            <div class="blog">
                @foreach($articles as $article)
                <div class="blog-item">
                    <img class="img-responsive img-blog" src="{!! url($article->path . $article->file_name) !!}" width="100%" alt=""/>

                    <div class="blog-content">
                        <a href="{!! URL::route('dashboard.article.show', array('slug'=>$article->slug)) !!}"><h3>{!! $article->title !!}</h3></a>

                        <div class="entry-meta">
                            <span><i class="icon-user"></i> <a href="#">Sefa</a></span>
                            <span datetime="{!! $article->created_at !!}" class="time"></span>
                        </div>
                        <p>{!! $article->content !!}</p>
                        <a class="btn btn-default" href="{!! URL::route('dashboard.article.show', array('slug'=>$article->slug)) !!}">Read More <i class="icon-angle-right"></i></a>
                    </div>
                </div>
                <!--/.blog-item-->
                @endforeach

                <ul class="pagination pagination-lg">
                    {!! $articles->render() !!}
                </ul>

                <!--/.pagination-->
            </div>
        </div>
        <!--/.col-md-8-->
    </div>
    <!--/.row-->
</section><!--/#blog-->
@stop

