@extends('backend/layout/layout')
@section('content')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#notification').show().delay(4000).fadeOut(700);
        });
    </script>
    <section class="content-header">
        <h1> Group
            <small> | Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! url(getLang(). '/admin/group') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Group</li>
        </ol>
    </section>
    <br>
    <div class="container">
        <div class="row"> {{ Notification::showAll() }}
            <br>

            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{!! langRoute('admin.group.create') !!}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Group </a>
                </div>
            </div>
            <br> <br> <br>
            @if($groups->count())
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $groups as $group )
                            <tr>
                                <td> {!! link_to_route(getLang(). '.admin.group.show', $group->name, $group->id, array(
                                    'class' => 'btn btn-link btn-xs' )) !!}
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                            Action <span class="caret"></span> </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{!! langRoute('admin.group.show', array($group->id)) !!}">
                                                    <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show User
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{!! langRoute('admin.group.edit', array($group->id)) !!}">
                                                    <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Group </a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="{!! URL::route('admin.group.delete', array($group->id)) !!}">
                                                    <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete
                                                    Group </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-danger">No results found</div>
            @endif
        </div>
        <div class="pull-left">
            <ul class="pagination">
                {!! $groups->render() !!}
            </ul>
        </div>
    </div>
@stop