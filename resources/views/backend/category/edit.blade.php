@extends('backend/layout/layout')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> Category
        <small> | Update Category</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! url(getLang(). '/admin/category') !!}"><i class="fa fa-list"></i> Category</a></li>
        <li class="active">Update Category</li>
    </ol>
</section>
<br>
<br>
<div class="container">

    {!! Form::open( array( 'route' => array( getLang() . '.admin.category.update', $category->id), 'method' => 'PATCH')) !!}
    <!-- Title -->
    <div class="control-group {!! $errors->has('title') ? 'has-error' : '' !!}">
        <label class="control-label" for="first-name">Title</label>

        <div class="controls">
            {!! Form::text('title', $category->title, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Title', 'value'=>Input::old('title'))) !!}
            @if ($errors->first('title'))
            <span class="help-block">{!! $errors->first('title') !!}</span>
            @endif
        </div>
    </div>
    <br>
    <!-- Form actions -->
    {!! Form::submit('Save Changes', array('class' => 'btn btn-success')) !!}
    <a href="{!! langUrl('admin/category') !!}" class="btn btn-default">&nbsp;Cancel</a>
    {!! Form::close() !!}

</div>
@stop