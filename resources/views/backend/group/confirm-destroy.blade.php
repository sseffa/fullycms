@extends('backend/layout/layout')
@section('content')
<section class="content-header">
    <h1> Group
        <small> | Delete Group</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! langRoute('admin.group.index') !!}"><i class="fa fa-user"></i> Group</a></li>
        <li class="active">Delete Group</li>
    </ol>
</section>
<br>
<br>
<br>
<div class="container">
    {!! Form::open( array( {!! Form::open( array(  'route' => array(getLang(). '.admin.group.destroy', $group->id ) ) ) !!}
    {!! Form::hidden( '_method', 'DELETE' ) !!}
    <div class="alert alert-warning">
        <div class="pull-left"><b> Be Careful!</b> Are you sure you want to delete <b>{!! $group->name !!} </b> ?
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