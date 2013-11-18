@extends('frontend/layout')
@section('content')
<style>
    pre code {
        diplay: none;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Blog</h1>
            @yield('partial/breadcrumbs', Breadcrumbs::render('blog', $articles))
        </div>
    </div>

        <div class="row">
             <div class="col-lg-8">
             @if($articles->count())
             @foreach( $articles as $article )
                <h3><a href="#">{{ $article->title }}</a></h3>
                <p>{{  date("d M Y a\t H:i a",strtotime($article->created_at)) }}</p><p>by <a href="#">Sefa</a></p>
                <p>{{{ mb_substr(strip_tags($article->content),0,600) }}}</p>
                <a href="{{ URL::route('dashboard.article.show', array('id'=>$article->id, 'slug'=>$article->slug)) }}" class="btn btn-primary">Read More</a>
            @endforeach
            @else
            <div class="alert alert-danger">No results found</div>
            @endif
           </div>
           <h4>Tags</h4>
           <div class="col-lg-4">
              <div class="row">
                    <div class="tagcloud tabbed_tag">
                        @foreach($tags as $tag)
                          <a href="{{ URL::route('dashboard.tag', array('tag'=>$tag->name)) }}">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <hr>
    <div class="pull-left">
        <ul class="pagination">
            {{ $articles->links() }}
        </ul>
    </div>
</div>
@stop

