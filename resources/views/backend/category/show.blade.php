@extends('backend/layout/layout')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> Category
        <small> | Show Category</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! langRoute('admin.category.index') !!}"><i class="fa fa-list"></i> Category</a></li>
        <li class="active">Show Category</li>
    </ol>
</section>
<br>
<br>
<div class="container">
    <div class="pull-left">
        <div class="btn-toolbar">
            <a href="{!! langRoute('admin.category.index') !!}"
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
            <td><strong>Title</strong></td>
            <td>{!! $category->title !!}</td>
        </tr>
        </tbody>
    </table>
</div>
</div>
</div>
@stop