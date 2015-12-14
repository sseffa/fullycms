@extends('backend/layout/layout')
@section('content')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#notification').show().delay(4000).fadeOut(700);
        });
    </script>
    <section class="content-header">
        <h1> Role
            <small> | Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! url(getLang(). '/admin/role') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Role</li>
        </ol>
    </section>
    <br>
    <div class="container">
        <div class="col-lg-10">
            @include('flash::message')
            <br>

            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{!! langRoute('admin.role.create') !!}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Role </a>
                </div>
            </div>
            <br> <br> <br>
            @if($roles->count())
                <div class="">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $roles as $role )
                            <tr>
                                <td> {!! link_to_route(getLang(). '.admin.role.show', $role->name, $role->id, array(
                                    'class' => 'btn btn-link btn-xs' )) !!}
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                            Action <span class="caret"></span> </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{!! langRoute('admin.role.show', array($role->id)) !!}">
                                                    <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show User
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{!! langRoute('admin.role.edit', array($role->id)) !!}">
                                                    <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Role </a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="{!! URL::route('admin.role.delete', array($role->id)) !!}">
                                                    <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete
                                                    Role </a>
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
                {!! $roles->render() !!}
            </ul>
        </div>
    </div>
@stop