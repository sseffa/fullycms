@extends('backend/layout/layout')
@section('content')
<section class="content-header">
    <h1> Form Post
        <small> | Form Post Delete</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! langRoute('admin.form-post.index') !!}"><i class="fa fa-envelope"></i> Form Post</a></li>
        <li class="active">Form Post Delete</li>
    </ol>
</section>
<br>
<br>
<br>
<div class="container">
    {!! Form::open( array( 'route' => array(getLang() .'.admin.form-post.destroy', $formPost->id ) ) ) !!}
    {!! Form::hidden( '_method', 'DELETE' ) !!}
    <div class="alert alert-warning">
        <div class="pull-left"><b> Be Careful!</b> Are you sure you want to delete <b>{!! $formPost->subject !!} </b> ?
        </div>
        <div class="pull-right">
            {!! Form::submit( 'Yes', array( 'class' => 'btn btn-danger' ) ) !!}
            {!! link_to( URL::previous(), 'No', array( 'class' => 'btn btn-primary' ) ) !!}
        </div>
        <div class="clearfix"></div>
    </div>
    {!! Form::close() !!}
</div>
@stop