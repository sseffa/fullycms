@extends('backend/layout/layout')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $('#notification').show().delay(4000).fadeOut(700);
    });
</script>
<section class="content-header">
    <h1> User
        <small> | Control Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! url(getLang(). '/admin/user') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">User</li>
    </ol>
</section>
<br>
<div class="container">
    <div class="row"> {{ Notification::showAll() }}
        <br>

        <div class="pull-left">
            <div class="btn-toolbar">
                <a href="{!! langRoute('admin.user.create') !!}" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span>&nbsp;New User
                </a>
            </div>
        </div>
        <br>
        <br>
        <br>
        @if($users->count())
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Joined</th>
                    <th>Last Login</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $users as $user )
                <tr>
                    <td> {!! link_to_route(getLang(). '.admin.user.show', $user->first_name . " " . $user->last_name, $user->id, array( 'class' => 'btn btn-link btn-xs' )) !!}
                    <td>{!! $user->email !!}</td>
                    <td>{!! $user->created_at !!}</td>
                    <td>{!! $user->last_login !!}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                Action
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{!! langRoute('admin.user.show', array($user->id)) !!}">
                                        <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show User
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! langRoute('admin.user.edit', array($user->id)) !!}">
                                        <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit User
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{!! URL::route('admin.user.delete', array($user->id)) !!}">
                                        <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete User
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
        @else
        <div class="alert alert-danger">No results found</div>
        @endif
    </div>
    <div class="pull-left">
        <ul class="pagination">
            {!! $users->render() !!}
        </ul>
    </div>
</div>
@stop