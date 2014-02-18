@extends('backend/_layout/layout')
@section('content')
{{ HTML::style('ckeditor/contents.css') }}
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $news->title }}</h3>
        </div>
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ url('admin/news') }}"
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
                    <td>{{ $news->title }}</td>
                </tr>
                <tr>
                    <td><strong>Slug</strong></td>
                    <td>{{ $news->slug }}</td>
                </tr>
                <tr>
                    <td><strong>Published</strong></td>
                    <td>{{ $news->is_published }}</td>
                </tr>
                <tr>
                    <td><strong>Content</strong></td>
                    <td>{{ $news->content }}</td>
                </tr>
                    <td><strong>Date Created</strong></td>
                    <td>{{ $news->created_at }}</td>
                </tr>
                <tr>
                    <td><strong>Date Updated</strong></td>
                    <td>{{ $news->updated_at }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop