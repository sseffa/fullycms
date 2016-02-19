@extends('backend/layout/layout')
@section('content')
{!! HTML::style('ckeditor/contents.css') !!}
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1> Page
        <small> | Show Page</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! langRoute('admin.page.index') !!}"><i class="fa fa-bookmark"></i> Page</a></li>
        <li class="active">Show Page</li>
    </ol>
</section>
<br>
<br>
<div class="container">
    <div class="col-lg-10">
        <div class="pull-left">
            <div class="btn-toolbar">
                <a href="{!! langRoute('admin.page.index') !!}"
                   class="btn btn-primary"> <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back </a>
            </div>
        </div>
        <br> <br> <br>
        <table class="table table-striped">
            <tbody>
            <tr>
                <td><strong>Title</strong></td>
                <td>{!! $page->title !!}</td>
            </tr>
            <tr>
                <td><strong>Published</strong></td>
                <td>{!! $page->is_published !!}</td>
            </tr>
            <tr>
                <td><strong>Content</strong></td>
                <td>{!! $page->content !!}</td>
            </tr>
            <tr>
                <td><strong>Date Created</strong></td>
                <td>{!! $page->created_at !!}</td>
            </tr>
            <tr>
                <td><strong>Date Updated</strong></td>
                <td>{!! $page->updated_at !!}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@stop
