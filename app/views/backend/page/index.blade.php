@extends('backend/layout')
@section('content')
<div class="container">
    <div class="pull-right">
        {{ HTML::link('/admin/page/create/','Create', array('class'=>'btn btn-default btn-info')) }}
    </div>
    <br>
    <br>
    <br>
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th class="span3">Page Title</th>
            <th class="span3">Create Date</th>
            <th class="span3">Updated Date</th>
            <th class="span3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pages as $page)
        <tr>
            <td> {{{ $page->title }}}</td>
            <td> {{{ $page->created_at }}}</td>
            <td> {{{ $page->updated_at }}}</td>
            <td>
                {{ HTML::link('/admin/page/'. $page->id .'/edit/','Edit', array('class'=>'btn btn-default btn-xs')) }}
                {{ link_to_route( 'page.delete', 'Delete', $page->id, array( 'class' => 'btn btn-danger btn-xs' )) }}
                {{ link_to_route( 'admin.page.show', 'Show', $page->id, array( 'class' => 'btn btn-info btn-xs' )) }}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pull-left">
        <ul class="pagination">
            {{ $pages->links() }}
        </ul>
    </div>
</div>
@stop
