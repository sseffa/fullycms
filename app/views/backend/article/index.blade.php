@extends('backend/layout')
@section('content')
<div class="container">
    <div class="pull-right">
        {{ HTML::link('/admin/article/create/','Create', array('class'=>'btn btn-default btn-info')) }}
    </div>
    <br>
    <br>
    <br>
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th class="span3">Article Title</th>
            <th class="span3">Create Date</th>
            <th class="span3">Updated Date</th>
            <th class="span3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $articles as $article )
        <tr>
            <td> {{{ $article->title }}}</td>
            <td> {{{ $article->created_at }}}</td>
            <td> {{{ $article->updated_at }}}</td>
            <td>
                {{ HTML::link('/admin/article/'. $article->id .'/edit/','Edit', array('class'=>'btn btn-default btn-xs')) }}
                {{ link_to_route( 'article.delete', 'Delete', $article->id, array( 'class' => 'btn btn-danger btn-xs' )) }}
                {{ link_to_route( 'admin.article.show', 'Show', $article->id, array( 'class' => 'btn btn-info btn-xs' )) }}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pull-left">
        <ul class="pagination">
            {{ $articles->links() }}
        </ul>
    </div>
</div>
@stop