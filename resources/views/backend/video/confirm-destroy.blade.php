@extends('backend/layout/layout')
@section('content')
<section class="content-header">
    <h1> Video <small> | Delete Video</small> </h1>
    <ol class="breadcrumb">
        <li><a href="{!! langRoute('admin.video.index') !!}"><i class="fa fa-play"></i> Video</a></li>
        <li class="active">Delete Video</li>
    </ol>
</section>
<br>
<br>
<br>
<div class="container">
    {!! Form::open( array(  'route' => array(getLang(). '.admin.video.destroy', $video->id ) ) ) !!}
    {!! Form::hidden( '_method', 'DELETE' ) !!}
    <div class="alert alert-warning">
        <div class="pull-left"><b> Be Careful!</b> Are you sure you want to delete <b>{!! $video->title !!} </b> ?
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