@extends('frontend/_layout/layout')
@section('content')
{{ HTML::style('ckeditor/contents.css') }}
{{ HTML::style('assets/css/style.css') }}
{{ HTML::style('code_prettify/css/prettify.css') }}
{{ HTML::script('code_prettify/js/prettify.js') }}
<div class="container">
    <div class="row">
        <div class="col-lg12">
            <h1 class="page-header">
                <small>{{ $article->title }}</small>
            </h1>
            @yield('partial/breadcrumbs', Breadcrumbs::render('blog.post.show', $article))
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <p><i class="icon-time"></i> Posted on {{ $article->created_at }} by <a href="www.sefakaragoz.com">Sefa</a>
            </p>
            {{ $article->content }}
        </div>

        <div class="col-lg-4">
            <div class="row">
                <h4>Categories</h4>

                <div class="tagcloud tabbed_tag">
                    @foreach($categories as $category)
                    <a href="{{ URL::route('dashboard.category', array('category'=>$category->title)) }}">{{ $category->title }}</a>
                    @endforeach
                </div>
            </div>

            <div class="row">
                <h4>Tags</h4>

                <div class="tagcloud tabbed_tag">
                    @foreach($tags as $tag)
                    <a href="{{ URL::route('dashboard.tag', array('tag'=>$tag->slug)) }}">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    !function ($) {
        $(function () {
            window.prettyPrint && prettyPrint()
        })
    }(window.jQuery)
</script>
@stop