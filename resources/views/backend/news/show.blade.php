@extends('backend/layout/layout')
@section('content')
{!! HTML::style('ckeditor/contents.css') !!}
<!-- Content Header (Page header) -->
<div class="pageheader">
  <h2><i class="fa fa-calendar"></i> News </h2>
  <div class="breadcrumb-wrapper">
    <span class="label"></span>
    <ol class="breadcrumb">
      <li><a href="{!! langRoute('admin.news.index') !!}">News</a></li>
      <li class="active">Show News</li>
    </ol>
  </div>
</div>
<br>
<br>
<div class="container">
    <div class="pull-left">
        <div class="btn-toolbar">
            <a href="{!! langRoute('admin.news.index') !!}"
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
            <td>{!! $news->title !!}</td>
        </tr>
        <tr>
            <td><strong>Slug</strong></td>
            <td>{!! $news->slug !!}</td>
        </tr>
        <tr>
            <td><strong>Published</strong></td>
            <td>{!! $news->is_published !!}</td>
        </tr>
        <tr>
            <td><strong>Content</strong></td>
            <td>{!! $news->content !!}</td>
        </tr>
        <tr>
            <td><strong>Date Created</strong></td>
            <td>{!! $news->created_at !!}</td>
        </tr>
        <tr>
            <td><strong>Date Updated</strong></td>
            <td>{!! $news->updated_at !!}</td>
        </tr>
        </tbody>
    </table>
</div>
</div>
</div>
@stop