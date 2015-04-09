@extends('backend/layout/layout')
@section('content')
<section class="content-header">
    <h1> Faq <small> | Delete Faq</small> </h1>
    <ol class="breadcrumb">
        <li><a href="{!! url(getLang(). '/admin/faq') !!}"><i class="fa fa-question"></i> Faq</a></li>
        <li class="active">Delete Faq</li>
    </ol>
</section>
<br>
<br>
<br>
<div class="container">
    {!! Form::open( array( 'route' => array(getLang(). '.admin.faq.destroy', $faq->id ) ) ) !!}
    {!! Form::hidden( '_method', 'DELETE' ) !!}
    <div class="alert alert-warning">
        <div class="pull-left"><b> Be Careful!</b> Are you sure you want to delete <b>{!! $faq->answer !!} </b> ?
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