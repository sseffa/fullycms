@extends('backend/_layout/layout')
@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $user->first_name . ' ' . $user->last_name }} Profile</h3>
        </div>
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ url('admin/user') }}"
                       class="btn btn-primary">
                        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                    </a>
                </div>
            </div>
            <br>
            <br>
            <br>
            <table class="table table-striped">
                <tbody>
                <tr>
                    <td><strong>Avatar</strong></td>
                    <td><img src="{{ gratavarUrl($user->email) }}" alt="{{ $user->email }}"/></td>
                </tr>
                <tr>
                    <td><strong>First Name</strong></td>
                    <td>{{ $user->first_name }}</td>
                </tr>
                <tr>
                    <td><strong>Last Name</strong></td>
                    <td>{{ $user->last_name }}</td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td><strong>Date Created</strong></td>
                    <td>{{ $user->created_at }}</td>
                </tr>
                <tr>
                    <td><strong>Last Login</strong></td>
                    <td>{{ $user->last_login }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop