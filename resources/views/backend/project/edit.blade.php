@extends('backend/layout/layout')
@section('content')
{!! HTML::script('ckeditor/ckeditor.js') !!}
{!! HTML::style('jasny-bootstrap/css/jasny-bootstrap.min.css') !!}
{!! HTML::script('jasny-bootstrap/js/jasny-bootstrap.min.js') !!}

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> Project <small> | Update Project</small> </h1>
    <ol class="breadcrumb">
        <li><a href="{!! url(getLang(). '/admin/project') !!}"><i class="fa fa-gears"></i> Project</a></li>
        <li class="active">Update Project</li>
    </ol>
</section>
<br>
<br>
<div class="container">

    {!! Form::open( array( 'route' => array( getLang() . '.admin.project.update', $project->id), 'method' => 'PATCH', 'files'=>true)) !!}

    <!-- Title -->
    <div class="control-group {!! $errors->has('title') ? 'has-error' : '' !!}">
        <label class="control-label" for="title">Title</label>
        <div class="controls"> {!! Form::text('title', $project->title, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Title', 'value'=>Input::old('title'))) !!}
            @if ($errors->first('title')) <span class="help-block">{!! $errors->first('title') !!}</span> @endif </div>
    </div>
    <br>


    <!-- Description -->
    <div class="control-group {!! $errors->has('description') ? 'has-error' : '' !!}">
        <label class="control-label" for="title">Description</label>
        <div class="controls">
            {!! Form::textarea('description', $project->description, array('class'=>'form-control', 'id' => 'description', 'placeholder'=>'Description', 'value'=>Input::old('description'))) !!}
            @if ($errors->first('description')) <span class="help-block">{!! $errors->first('description') !!}</span> @endif </div>
    </div>
    <br>

    <!-- Image -->
    <div class="fileinput fileinput-new control-group {!! $errors->has('image') ? 'has-error' : '' !!}" data-provides="fileinput">
        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
            <img data-src="" {!! (($project->path) ? "src='".url($project->path)."'" : null) !!} alt="...">
        </div>
        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
        <div>
        <div> <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
        {!! Form::file('image', null, array('class'=>'form-control', 'id' => 'image', 'placeholder'=>'Image', 'value'=>Input::old('image'))) !!}
      @if ($errors->first('image')) <span class="help-block">{!! $errors->first('image') !!}</span> @endif </span> <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
    </div>
    <br>

    {!! Form::submit('Save', array('class' => 'btn btn-success')) !!}
    {!! Form::close() !!}
    <script type="text/javascript">
        window.onload = function () {
            CKEDITOR.replace('description', {
                "filebrowserBrowseUrl": "{!! url('filemanager/show') !!}"
            });
        };
    </script>
</div>
@stop