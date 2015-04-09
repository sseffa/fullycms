@extends('backend/layout/layout')
@section('content')
<section class="content-header">
    <h1> Page <small> | Delete Page</small> </h1>
    <ol class="breadcrumb">
        <li><a href="{!! langRoute('admin.page.index') !!}"><i class="fa fa-bookmark"></i> Dashboard</a></li>
        <li class="active">Delete Page</li>
    </ol>
</section>
<br>
<br>
<br>
<div class="container">
    {!! Form::open( array(  'route' => array(getLang(). '.admin.page.destroy', $page->id ) ) ) !!}
    {!! Form::hidden('_method', 'DELETE') !!}
     <div class="alert alert-danger">
            There might be a link given to this page, <a href="{!! langRoute('admin.menu.index') !!}">Check it</a>
        </div>
    <div class="alert alert-warning">
        <div class="pull-left"><b> Be Careful!</b> Are you sure you want to delete <b>{!! $page->title !!} </b> ?
        </div>
        <div class="pull-right">
            {!! Form::submit('Yes', array('class' => 'btn btn-danger')) !!}
            {!! link_to( URL::previous(), 'No', array( 'class' => 'btn btn-primary' ) ) !!}
        </div>
        <div class="clearfix"></div>
    </div>
    {!! Form::close() !!}
</div>
@stop
