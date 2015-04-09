@extends('backend/layout/layout')
@section('content')
<div class="pageheader">
  <h2><i class="fa fa-bars"></i> Menu </h2>
  <div class="breadcrumb-wrapper">
    <span class="label"></span>
    <ol class="breadcrumb">
      <li><a href="{!! langRoute('admin.menu.index') !!}">Menu</a></li>
      <li class="active">Delete Menu Item</li>
    </ol>
  </div>
</div>
<br>
<br>
<br>
<div class="container">
    {!! Form::open( array( 'route' => array( getLang() . '.admin.menu.destroy', $menu->id ) ) ) !!}
    {!! Form::hidden( '_method', 'DELETE' ) !!}
    <div class="alert alert-warning">
        <div class="pull-left"><b> Be Careful!</b> Are you sure you want to delete <b>{!! $menu->title !!} </b> ?
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
