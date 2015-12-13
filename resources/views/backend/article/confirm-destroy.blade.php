@extends('backend/layout/layout')
@section('content')
<section class="content-header">
    <h1> Article
        <small> | Delete Article</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! langRoute('admin.article.index') !!}"><i class="fa fa-book"></i> Article</a></li>
        <li class="active">Delete Article</li>
    </ol>
</section>
<br>
<br>
<br>
<div class="col-lg-10">
    {!! Form::open( array(  'route' => array(getLang(). '.admin.article.destroy', $article->id ) ) ) !!}
    {!! Form::hidden( '_method', 'DELETE' ) !!}
    <div class="alert alert-warning">
        <div class="pull-left"><b> Be Careful!</b> Are you sure you want to delete <b>{!! $article->title !!} </b> ?
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