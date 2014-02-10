@extends('backend/_layout/layout')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $('#notification').show().delay(4000).fadeOut(700);
    });
</script>
<div class="container">
    {{ Notification::showAll() }}
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Categories</h3>
        </div>
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('admin.category.create') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Category
                    </a>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $categories as $category )
                    <tr>
                        <td> {{ link_to_route( 'admin.category.show', $category->title, $category->id, array( 'class' => 'btn btn-link btn-xs' )) }}
                        <td>                         
                            <div class="btn-group">
                                <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                    Action
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ URL::route('admin.category.show', array($category->id)) }}">
                                            <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show Category
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::route('admin.category.edit', array($category->id)) }}">
                                            <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Category
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ URL::route('admin.category.delete', array($category->id)) }}">
                                            <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete Category
                                        </a>
                                    </li>

                                     <li class="divider"></li>
                                    <li>
                                        <a target="_blank" href="{{ $category->url }}">
                                            <span class="glyphicon glyphicon-eye-open"></span>&nbsp;View On Site
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="pull-left">
        <ul class="pagination">
            {{ $categories->links() }}
        </ul>
    </div>
</div>
@stop