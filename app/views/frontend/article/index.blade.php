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
    @foreach( $articles as $article )
    <div class="row">
        <div class="col-md-1">
            <p><i class="icon-file-text icon-4x"></i></p>
        </div>
        <div class="col-md-12">
            <h3><a href="#">{{ $article->title }}</a></h3>
            <p>{{  date("d M Y a\t H:i a",strtotime($article->created_at)) }}</p><p>by <a href="#">Sefa</a></p>
            <p>{{{ mb_substr(strip_tags($article->content),0,600) }}}</p>
            {{-- link_to_route( 'dashboard.article.show', 'Read More', array('id'=>$article->id, 'slug'=>$article->slug), array( 'class' => 'btn btn-primary' )) --}}
            <!-- <a href="{{ URL::route( 'dashboard.article.show', array('id'=>$article->id, 'slug'=>$article->slug)) }}" class= "btn btn-primary">Read More</a> -->
             <a href="{{ URL::route('dashboard.article.show', array('id'=>$article->id, 'slug'=>$article->slug)) }}" class="btn btn-primary">Read More</a>
        </div>
    </div>
    <hr>
    @endforeach
    <div class="pull-left">
        <ul class="pagination">
            {{ $articles->links() }}
        </ul>
    </div>
</div>
@stop

