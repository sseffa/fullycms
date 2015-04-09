@extends('frontend/layout/layout')
@section('content')
{!! HTML::style('ckeditor/contents.css') !!}
{!! HTML::script("frontend/js/jquery.isotope.min.js") !!}

<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Projets</h1>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
            </div>
            <div class="col-sm-6">
               @yield('partial/breadcrumbs', Breadcrumbs::render('project', $projects))
            </div>
        </div>
    </div>
</section><!--/#title-->

<section id="portfolio" class="container">
    <!--
    <ul class="portfolio-filter">
        <li><a class="btn btn-default active" href="#" data-filter="*">All</a></li>
        <li><a class="btn btn-default" href="#" data-filter=".bootstrap">Bootstrap</a></li>
        <li><a class="btn btn-default" href="#" data-filter=".html">HTML</a></li>
        <li><a class="btn btn-default" href="#" data-filter=".wordpress">Wordpress</a></li>
    </ul>
    -->

    <ul class="portfolio-items col-3">
        @foreach($projects as $project)
        <li class="portfolio-item apps">
            <div class="item-inner">
               @if($project->path)
                <img src="{!! url($project->path . 'thumb_' . $project->file_name) !!}" alt="">
               @else
                <img src="{!! url('assets/images/project_thumb.png') !!}" alt="">
               @endif
                <h5>{!! $project->title !!}</h5>
                <div class="overlay">
                @if($project->path)
                    <a class="preview btn btn-danger" href="{!! url($project->path . $project->file_name) !!}" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
                @else
                    <a class="preview btn btn-danger" href="{!! url('assets/images/default.png') !!}" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
                @endif

                    <a class="preview btn btn-danger" href="{!! URL::route('dashboard.project.show', array('slug'=>$project->slug)) !!}" ><i class="icon-info-sign"></i></a>
                </div>
            </div>
        </li><!--/.portfolio-item-->
        @endforeach
    </ul>
</section><!--/#portfolio-->
@stop


