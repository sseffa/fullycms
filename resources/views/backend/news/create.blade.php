@extends('backend/layout/layout')
@section('content')
    {!! HTML::script('ckeditor/ckeditor.js') !!}
    {!! HTML::style('assets/bootstrap/css/bootstrap-tagsinput.css') !!}
    {!! HTML::style('jasny-bootstrap/css/jasny-bootstrap.min.css') !!}
    {!! HTML::script('assets/bootstrap/js/bootstrap-tagsinput.js') !!}
    {!! HTML::script('assets/js/jquery.slug.js') !!}
    {!! HTML::script('jasny-bootstrap/js/jasny-bootstrap.min.js') !!}
    {!! HTML::style('bootstrap_datepicker/css/datepicker.css') !!}
    {!! HTML::script('bootstrap_datepicker/js/bootstrap-datepicker.js') !!}
    {!! HTML::script('bootstrap_datepicker/js/locales/bootstrap-datepicker.tr.js') !!}
    <script type="text/javascript">
        $(document).ready(function () {
            $("#title").slug();

            $('#datetime').datepicker({
                format: "yyyy-mm-dd",
                todayBtn: "linked",
                orientation: "top auto"
            });

            if ($('#tag').length != 0) {
                var elt = $('#tag');
                elt.tagsinput();
            }
        });
    </script>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> News <small> | Add News</small> </h1>
        <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin/news') !!}"><i class="fa fa-bookmark"></i> News</a></li>
            <li class="active">Add News</li>
        </ol>
    </section>
    <br>
    <br>
    <div class="container">
        {!! Form::open(array('action' => '\Fully\Http\Controllers\Admin\NewsController@store', 'files'=>true)) !!}
        <!-- Title -->
        <div class="control-group {!! $errors->has('title') ? 'has-error' : '' !!}">
            <label class="control-label" for="title">Title</label>

            <div class="controls"> {!! Form::text('title', null, array('class'=>'form-control', 'id' => 'title',
                'placeholder'=>'Title', 'value'=>Input::old('title'))) !!}
                @if ($errors->first('title')) <span class="help-block">{!! $errors->first('title') !!}</span> @endif
            </div>
        </div>
        <br>
        <!-- Datetime -->
        <div class="control-group {!! $errors->has('datetime') ? 'has-error' : '' !!}">
            <label class="control-label" for="title">Datetime</label>

            <div class="controls"> {!! Form::text('datetime', null, array('class'=>'form-control', 'id' => 'datetime',
                'value'=>Input::old('datetime'))) !!}
                @if ($errors->first('datetime'))
                    <span class="help-block">{!! $errors->first('datetime') !!}</span> @endif </div>
        </div>
        <br>
        <!-- Content -->
        <div class="control-group {!! $errors->has('content') ? 'has-error' : '' !!}">
            <label class="control-label" for="title">Content</label>

            <div class="controls"> {!! Form::textarea('content', null, array('class'=>'form-control', 'id' => 'content',
                'placeholder'=>'Content', 'value'=>Input::old('content'))) !!}
                @if ($errors->first('content')) <span class="help-block">{!! $errors->first('content') !!}</span> @endif
            </div>
        </div>
        <br>
        <!-- Image -->
        <div class="fileinput fileinput-new control-group {!! $errors->has('image') ? 'has-error' : '' !!}" data-provides="fileinput">
            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
            <div> <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span> {!! Form::file('image', null, array('class'=>'form-control', 'id' => 'image', 'placeholder'=>'Image', 'value'=>Input::old('image'))) !!}
                    @if ($errors->first('image')) <span class="help-block">{!! $errors->first('image') !!}</span> @endif </span>
                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a></div>
        </div>
        <br>
        <!-- Published -->
        <div class="control-group {!! $errors->has('is_published') ? 'has-error' : '' !!}">
            <div class="controls">
                <label class="">{!! Form::checkbox('is_published', 'is_published') !!} Publish ?</label>
                @if ($errors->first('is_published'))
                    <span class="help-block">{!! $errors->first('is_published') !!}</span> @endif </div>
        </div>
        <br> {!! Form::submit('Create', array('class' => 'btn btn-success')) !!} {!! Form::close() !!}
        <script type="text/javascript">
            window.onload = function () {
                CKEDITOR.replace('content', {
                    "filebrowserBrowseUrl": "{!! url('filemanager/show') !!}",
                });
            };
        </script>
@stop