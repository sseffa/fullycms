@extends('backend/layout')
@section('content')
{{ HTML::script('ckeditor/ckeditor.js') }}

{{ HTML::style('bootstrap/css/bootstrap-tagsinput.css') }}
{{ HTML::script('bootstrap/js/typeahead.min.js') }}
{{ HTML::script('bootstrap/js/bootstrap-tagsinput.js') }}
{{ HTML::script('bootstrap/js/jquery.slug.js') }}
<script type="text/javascript">
    $(document).ready(function () {
        $("#title").slug();
    });
</script>
<div class="container">
    <div class="page-header">
        <h3>
            Article Update
            <div class="pull-right">
                {{ HTML::link('/admin/article','Back', array('class'=>'btn btn-primary')) }}
            </div>
        </h3>
    </div>
    {{ Form::open( array( 'action' => array( 'App\Controllers\Admin\ArticleController@update', $article->id), 'method' => 'PATCH')) }}
    <!-- Title -->
    <div class="control-group {{ $errors->has('title') ? 'has-error' : '' }}">
        <label class="control-label" for="title">Title</label>

        <div class="controls">
            {{ Form::text('title', $article->title, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Title', 'value'=>Input::old('title'))) }}
            @if ($errors->first('title'))
            <span class="help-block">{{ $errors->first('title') }}</span>
            @endif
        </div>
    </div>
    <br>

    <!-- Slug -->
    <div class="control-group {{ $errors->has('slug') ? 'has-error' : '' }}">
        <label class="control-label" for="title">Slug</label>

        <div class="controls">
            {{ Form::text('slug', $article->slug, array('class'=>'form-control', 'id' => 'slug', 'placeholder'=>'Slug', 'value'=>Input::old('slug'))) }}
            @if ($errors->first('slug'))
            <span class="help-block">{{ $errors->first('slug') }}</span>
            @endif
        </div>
    </div>
    <br>

    <!-- Tag -->
    <div class="control-group {{ $errors->has('tag') ? 'has-error' : '' }}">
        <label class="control-label" for="title">Tag</label>

        <div class="controls">
            {{ Form::text('tag', $tags, array('class'=>'form-control', 'id' => 'tag', 'placeholder'=>'Tag', 'value'=>Input::old('tag'))) }}
            @if ($errors->first('tag'))
            <span class="help-block">{{ $errors->first('tag') }}</span>
            @endif
        </div>
    </div>
    <br>

     <!-- Category -->
    <div class="control-group {{ $errors->has('category') ? 'error' : '' }}">
        <label class="control-label" for="title">Category</label>

        <div class="controls">
            {{ Form::select('category', $categories, $article->category_id, array('class' => 'form-control', 'value'=>Input::old('category'))) }}
            @if ($errors->first('category'))
            <span class="help-block">{{ $errors->first('category') }}</span>
            @endif
        </div>
    </div>
    <br>

    <!-- Content -->
    <div class="control-group {{ $errors->has('content') ? 'has-error' : '' }}">
        <label class="control-label" for="title">Content</label>

        <div class="controls">
            {{ Form::textarea('content', $article->content, array('class'=>'form-control', 'id' => 'content', 'placeholder'=>'Content', 'value'=>Input::old('content'))) }}
            @if ($errors->first('content'))
            <span class="help-block">{{ $errors->first('content') }}</span>
            @endif
        </div>
    </div>
    <br>

  <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th-list">
                </span>META DATA</a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Meta Title -->
                        <div class="control-group {{ $errors->has('meta_title') ? 'has-error' : '' }}">
                            <label class="control-label" for="title">Meta Title</label>

                            <div class="controls">
                                {{ Form::text('meta_title', $article->meta_title, array('class'=>'form-control', 'id' => 'meta_title', 'placeholder'=>'Meta Title', 'value'=>Input::old('meta_title'))) }}
                                @if ($errors->first('meta_title'))
                                <span class="help-block">{{ $errors->first('meta_title') }}</span>
                                @endif
                            </div>
                        </div>
                        <br>

                        <!-- Meta Description -->
                        <div class="control-group {{ $errors->has('meta_description') ? 'has-error' : '' }}">
                            <label class="control-label" for="title">Meta Description</label>

                            <div class="controls">
                                {{ Form::text('meta_description', $article->meta_description, array('class'=>'form-control', 'id' => 'meta_description', 'placeholder'=>'Meta Description', 'value'=>Input::old('meta_description'))) }}
                                @if ($errors->first('meta_description'))
                                <span class="help-block">{{ $errors->first('meta_description') }}</span>
                                @endif
                            </div>
                        </div>
                        <br>

                        <!-- Meta Keywords -->
                        <div class="control-group {{ $errors->has('meta_keywords') ? 'has-error' : '' }}">
                            <label class="control-label" for="title">Meta Keywords</label>

                            <div class="controls">
                                {{ Form::textarea('meta_keywords', $article->meta_keywords, array('class'=>'form-control', 'id' => 'meta_keywords', 'placeholder'=>'Meta Keywords', 'value'=>Input::old('meta_keywords'))) }}
                                @if ($errors->first('meta_keywords'))
                                <span class="help-block">{{ $errors->first('meta_keywords') }}</span>
                                @endif
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="well well-sm well-primary">
                            <form class="form form-inline " role="form">
                            <div class="form-group">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Published -->
    <div class="control-group {{ $errors->has('is_published') ? 'has-error' : '' }}">

        <div class="controls">
            <label class="checkbox">{{ Form::checkbox('is_published', 'is_published',$article->is_published) }} Publish ?</label>
            @if ($errors->first('is_published'))
            <span class="help-block">{{ $errors->first('is_published') }}</span>
            @endif
        </div>
    </div>
    <br>
    {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
    {{ Form::close() }}
    <script>
        window.onload = function () {
            CKEDITOR.replace('content', {
                "filebrowserBrowseUrl": "{{ url('filemanager/show') }}"
            });
        };

        $(document).ready(function () {

            if ($('#tag').length != 0) {
                var elt = $('#tag');
                elt.tagsinput();
            }
        });
    </script>
</div>
@stop