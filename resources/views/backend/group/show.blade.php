@extends('backend/layout/layout')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> Group
        <small> | Show Group</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! langRoute('admin.group.index') !!}"><i class="fa fa-user"></i> Group</a></li>
        <li class="active">Show Group</li>
    </ol>
</section>
<br>
<br>
<div class="container">
    <div class="pull-left">
        <div class="btn-toolbar">
            <a href="{!! langRoute('admin.group.index') !!}"
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
            <td><strong>Group Name</strong></td>
            <td>{!! $group->name !!}</td>
        </tr>
        </tbody>
    </table>
</div>
@stop