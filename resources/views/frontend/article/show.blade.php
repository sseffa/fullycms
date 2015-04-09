@extends('frontend/layout/layout')
@section('content')
{!! HTML::style('ckeditor/contents.css') !!}
{!! HTML::style('code_prettify/css/prettify.css') !!}
{!! HTML::script('code_prettify/js/prettify.js') !!}
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
                <h1>Blog Item</h1>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
            </div>
            <div class="col-sm-6">
                @yield('partial/breadcrumbs', Breadcrumbs::render('blog.post.show', $article))
            </div>
        </div>
    </div>
</section><!--/#title-->

<section id="blog" class="container">
    <div class="row">
        @include('frontend/article/sidebar', array($tags, $categories))
        <div class="col-sm-8 col-sm-pull-4">
            <div class="blog">
                <div class="blog-item">
                    @if($article->path)
                    <img class="img-responsive img-blog" src="{!! url($article->path . $article->file_name) !!}" width="100%" style="border: 1px solid #bdc3c7;" alt="" />
                    @else
                    <img class="img-responsive img-blog" src="{!! url('assets/images/blog_default.png') !!}" width="100%" style="border: 1px solid #bdc3c7; height: 290px;" alt=""/>
                    @endif

                    <div class="blog-content">
                        <h3>{!! $article->title !!}</h3>
                        <div class="entry-meta">
                           <span><i class="icon-user"></i> <a href="#">Sefa</a></span>
                            <span datetime="{!! $article->created_at !!}" class="time"></span>
                        </div>

                        <p>{!! $article->content !!}</p>

                        <hr>

                        <div class="tags">
                            <i class="icon-tags"></i> Tags
                            @foreach($article->tags as $tag)
                            <a class="btn btn-xs btn-primary" href="{!! URL::route('dashboard.tag', array('tag'=>$tag->slug)) !!}">{!! $tag->name !!}</a>
                            @endforeach
                        </div>
                        <p>&nbsp;</p>
                    </div>
                </div><!--/.blog-item-->
            </div>
        </div><!--/.col-md-8-->
    </div><!--/.row-->
</section><!--/#blog-->
<script type="text/javascript">
    !function ($) {
        $(function () {
            window.prettyPrint && prettyPrint()
        })
    }(window.jQuery)
</script>
@stop
