@extends('backend/layout/layout')
@section('content')
<section class="content-header">
    <h1> Form Post
        <small> | Form Post View</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! langRoute('admin.form-post.index') !!}"><i class="fa fa-envelope"></i> Form Post</a></li>
        <li class="active">Form Post View</li>
    </ol>
</section>
<br>
<br>
<div class="container">
    <div class="pull-left">
        <div class="btn-toolbar">
            <a href="{!! langRoute('admin.form-post.index') !!}"
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
            <td>{!! $formPost->created_ip !!}</td>
        </tr>
        <tr>
            <td><strong>Name and Surname</strong></td>
            <td>{!! e($formPost->sender_name_surname) !!}</td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td>{!! $formPost->sender_email !!}</td>
        </tr>
        <tr>
            <td><strong>Phone Number</strong></td>
            <td>{!! e($formPost->sender_phone_number) !!}</td>
        </tr>
        <tr>
            <td><strong>Subject</strong></td>
            <td>{!! e($formPost->subject) !!}</td>
        </tr>
        <tr>
            <td><strong>Message</strong></td>
            <td>{!! e($formPost->message) !!}</td>
        </tr>
        </tbody>
    </table>
</div>
@stop