@extends('frontend/layout/layout')
@section('content')
{!! HTML::style('ckeditor/contents.css') !!}

<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Project</h1>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
            </div>
            <div class="col-sm-6">
                @yield('partial/breadcrumbs', Breadcrumbs::render('project.show', $project))
            </div>
        </div>
    </div>
</section><!--/#title-->

<section id="project" class="container">
    <h2>{!! $project->title !!}</h2>
    <h6 class="pull-right">{!! $project->created_at !!}</h6>
    <br>
    <br>
    @if($project->path)
    <img style="border: 1px solid #b0afaf; padding:5px; float:left; margin-right: 20px; margin-bottom: 10px;" src="{!! url($project->path . 'thumb_' . $project->file_name) !!}" class="img-square center-block">
    @else
    <img style="border: 1px solid #b0afaf; padding:5px; float:left; margin-right: 20px; margin-bottom: 10px;" src="{!! url('assets/images/project_thumb.png') !!}" class="img-square center-block">
    @endif
    {!! $project->description !!}
</section><!--#faqs-->
@stop