@extends('frontend/layout/layout')
@section('content')
{!! HTML::style('ckeditor/contents.css') !!}

<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>{!! $news->title !!}</h1>
            </div>
            <div class="col-sm-6">
                @yield('partial/breadcrumbs', Breadcrumbs::render('news.show', $news))
            </div>
        </div>
    </div>
</section><!--/#title-->

<section class="container">
    <div class="row">
     @include('frontend/news/sidebar')
     <div class="col-sm-8 col-sm-pull-4">
        <h2>{!! $news->title !!}</h2>
        <h6 class="pull-left">{!! $news->created_at !!}</h6>
        <br>
        <br>
        @if($news->path)
            <img style="border: 1px solid #b0afaf; padding:5px; float:left; margin-right: 20px; margin-bottom: 10px;" src="{!! url($news->path) !!}" class="img-square center-block">
        @else
            <img style="border: 1px solid #b0afaf; padding:5px; float:left; margin-right: 20px; margin-bottom: 10px;" src="{!! url('assets/images/news_m_thumb.png') !!}" class="img-square center-block">
        @endif

        {!! $news->content !!}
        </div>
    </div>
</section>
@stop