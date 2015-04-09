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
                <h1>Blog</h1>

                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
            </div>
            <div class="col-sm-6">
                @yield('partial/breadcrumbs', Breadcrumbs::render('blog', $articles))
            </div>
        </div>
    </div>
</section><!--/#title-->

<section id="blog" class="container">
    <div class="row">
        <aside class="col-sm-4 col-sm-push-8">
            <div class="widget search">
                <form role="form">
                    <div class="input-group">
                        <input type="text" class="form-control" autocomplete="off" placeholder="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button"><i class="icon-search"></i></button>
                            </span>
                    </div>
                </form>
            </div>
            <!--/.search-->

            <div class="widget categories">
                <h3>Blog Categories</h3>

                <div class="row">
                    <div class="col-sm-6">
                        <ul class="arrow">
                            @foreach($categories as $category)
                            <li><a href="{!! URL::route('dashboard.category', array('category'=>$category->title)) !!}">{!! $category->title !!}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <ul class="arrow">
                            @foreach($categories as $category)
                            <li><a href="{!! URL::route('dashboard.category', array('category'=>$category->title)) !!}">{!! $category->title !!}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!--/.categories-->
            <div class="widget tags">
                <h3>Tag Cloud</h3>
                <ul class="tag-cloud">
                    @foreach($tags as $tag)
                    <li><a class="btn btn-xs btn-primary" href="{!! URL::route('dashboard.tag', array('tag'=>$tag->slug)) !!}">{!! $tag->name !!}</a></li>
                    @endforeach
                </ul>
            </div>
            <!--/.tags-->

        </aside>
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

