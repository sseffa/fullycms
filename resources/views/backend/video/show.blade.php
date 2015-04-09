@extends('backend/layout/layout')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> Video
        <small> | Show Video</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! langRoute('admin.video.index') !!}><i class="fa fa-play"></i> Video</a></li>
        <li class="active">Show Video</li>
    </ol>
</section>
<br>
<br>
<div class="container">
    <div class="pull-left">
        <div class="btn-toolbar">
            <a href="{!! langRoute('admin.video.index') !!}"
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
            <td>{!! $video->title !!}</td>
        </tr>
        </tbody>
    </table>
</div>
</div>
</div>
@stop