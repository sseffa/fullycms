@extends('frontend/layout')
@section('content')
{{ HTML::style('/ckeditor/contents.css') }}

{{ HTML::style('/bootstrap/css/prettify.css') }}
{{ HTML::script('/bootstrap/js/prettify.js') }}
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><small>{{ $article->title }}</small></h1>
            @yield('partial/breadcrumbs', Breadcrumbs::render('blog.post.show', $article))
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <p><i class="icon-time"></i> Posted on {{ $article->created_at }} by <a href="www.sefakaragoz.com">Sefa</a>
            </p>
            <p class="lead">{{ $article->content }}</p>
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