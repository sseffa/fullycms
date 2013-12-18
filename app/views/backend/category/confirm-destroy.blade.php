@extends('backend/_layout/layout')
@section('content')
<div class="container">
    {{ Form::open( array( 'route' => array( 'admin.category.destroy', $category->id ) ) ) }}
    {{ Form::hidden( '_method', 'DELETE' ) }}
    <div class="alert alert-warning">
        <div class="pull-left"><b> Be Careful!</b> Are you sure you want to delete <b>{{{ $category->title }}} and related articles </b> ?
        </div>
        <div class="pull-right">
            {{ Form::submit( 'Yes', array( 'class' => 'btn btn-danger' ) ) }}
            {{ link_to( URL::previous(), 'No', array( 'class' => 'btn btn-primary' ) ) }}
        </div>
        <div class="clearfix"></div>
    </div>
    {{ Form::close() }}
</div>
@stop