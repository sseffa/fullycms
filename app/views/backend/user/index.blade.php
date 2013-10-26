@extends('backend/layout')
@section('content')
<div class="container">
    <div class="pull-right">
        {{ HTML::link('/admin/user/create/','Create', array('class'=>'btn btn-default btn-info')) }}
    </div>
    <br>
    <br>
    <br>
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th class="span3">User Name</th>
            <th class="span3">User Email</th>
            <th class="span3">User Create Date</th>
            <th class="span3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $users as $user )
        <tr>
            <td> {{{ $user->first_name . " " . $user->last_name }}}</td>
            <td> {{{ $user->email }}}</td>
            <td> {{{ $user->created_at }}}</td>
            <td>
                {{ HTML::link('/admin/user/'. $user->id .'/edit/','Edit', array('class'=>'btn btn-default btn-xs')) }}
                {{ link_to_route( 'admin.user.delete', 'Delete', $user->id, array( 'class' => 'btn btn-danger btn-xs' )) }}
                {{ link_to_route( 'admin.user.show', 'Show', $user->id, array( 'class' => 'btn btn-info btn-xs' )) }}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pull-left">
        <ul class="pagination">
            {{ $users->links() }}
    </div>
</div>
@stop