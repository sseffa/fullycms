@extends('frontend/layout')
@section('content')
{{ HTML::style('/ckeditor/contents.css') }}
{{ HTML::style('/boostrap/custom_style.css') }}
<div class="container">
    <div class="row">
        <div class="col-lg12">
            <h1 class="page-header"><small>{{ $article->title }}</small></h1>
            @yield('partial/breadcrumbs', Breadcrumbs::render('blog.post.show', $article))
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <p><i class="icon-time"></i> Posted on {{ $article->created_at }} by <a href="www.sefakaragoz.com">Sefa</a>
            </p>
            {{ $article->content }}
        </div>
        <h4>Tags</h4>
       <div class="col-lg-4">
          <div class="row">
                <div class="tagcloud tabbed_tag">
                    @foreach($tags as $tag)
                      <a href="#">{{ $tag->name }}</a>
                    @endforeach
                </div>
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