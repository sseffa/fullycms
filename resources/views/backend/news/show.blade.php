@extends('backend/layout/layout')
@section('content')
{!! HTML::style('ckeditor/contents.css') !!}
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        News
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! langRoute('admin.news.index') !!}">News</a></li>
        <li class="active">News</li>
    </ol>
</section>
<br>
<br>
<div class="container">
    <div class="col-lg-10">
        <div class="pull-left">
            <div class="btn-toolbar">
                <a href="{!! langRoute('admin.news.index') !!}"
                   class="btn btn-primary"> <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back </a>
            </div>
        </div>
        <br> <br> <br>
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
</div>
@stop