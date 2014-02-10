@extends('backend/_layout/layout')
@section('content')
{{ HTML::style('ckeditor/contents.css') }}
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $article->title }}</h3>
        </div>
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ url('admin/article') }}"
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
                    <td>{{ $article->title }}</td>
                </tr>
                <tr>
                    <td><strong>Slug</strong></td>
                    <td>{{ $article->slug }}</td>
                </tr>
                <tr>
                    <td><strong>Category</strong></td>
                    <td>{{ $article->category[0]->title }}</td>
                </tr>
                <tr>
                    <td><strong>Date Created</strong></td>
                    <td>{{ $article->created_at }}</td>
                </tr>
                <tr>
                    <td><strong>Date Updated</strong></td>
                    <td>{{ $article->updated_at }}</td>
                </tr>
                <tr>
                    <td><strong>Meta Keywords</strong></td>
                    <td>{{ $article->meta_keywords }}</td>
                </tr>
                <tr>
                    <td><strong>Meta Description</strong></td>
                    <td>{{ $article->meta_description }}</td>
                </tr>
                <tr>
                    <td><strong>Published</strong></td>
                    <td>{{ $article->is_published }}</td>
                </tr>
                <tr>
                    <td><strong>Tag</strong></td>
                    <td>                        
                        @foreach($article->tags as $tag)
                        {{ $tag->name }},
                        @endforeach                      
                    </td>
                </tr>
                <tr>
                    <td><strong>Content</strong></td>
                    <td>{{ $article->content }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
