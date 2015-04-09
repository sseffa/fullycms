@extends('backend/layout/layout')
@section('content')
{!! HTML::style('ckeditor/contents.css') !!}
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> Project
        <small> | Show News</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! langRoute('admin.project.index') !!}"><i class="fa fa-gears"></i> Project</a></li>
        <li class="active">Show Project</li>
    </ol>
</section>
<br>
<br>
<div class="container">
    <div class="pull-left">
        <div class="btn-toolbar">
            <a href="{!! langRoute('admin.project.index') !!}"
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
            <td>{!! $project->title !!}</td>
        </tr>
        <tr>
            <td><strong>Description</strong></td>
            <td>{!! $project->description !!}</td>
        </tr>
        <tr>
            <td><strong>Date Created</strong></td>
            <td>{!! $project->created_at !!}</td>
        </tr>
        <tr>
            <td><strong>Date Updated</strong></td>
            <td>{!! $project->updated_at !!}</td>
        </tr>
        </tbody>
    </table>
</div>
</div>
</div>
@stop