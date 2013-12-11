@extends('backend/_layout/layout')
@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Post Info</h3>
        </div>
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ url('admin/form-post') }}"
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
                    <td><strong>IP</strong></td>
                    <td>{{ $formPost->created_ip }}</td>
                </tr>
                <tr>
                    <td><strong>Name and Surname</strong></td>
                    <td>{{ e($formPost->sender_name_surname) }}</td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td>{{ $formPost->sender_email }}</td>
                </tr>
                <tr>
                    <td><strong>Phone Number</strong></td>
                    <td>{{ e($formPost->sender_phone_number) }}</td>
                </tr>
                <tr>
                    <td><strong>Subject</strong></td>
                    <td>{{ e($formPost->subject) }}</td>
                </tr>
                <tr>
                    <td><strong>Message</strong></td>
                    <td>{{ e($formPost->message) }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop