@extends('backend/layout/layout')
@section('content')
{!! HTML::script('/assets/js/fully.js') !!}
<script type="text/javascript">
    $(document).ready(function () {

        $("#video_id").keyup(function () {

            $("#msg").append('<div class="msg-save" style="float:right; color:red;">Searching!</div>');
            $('.msg-save').delay(1000).fadeOut(500);

            var id = $(this).val();
            var type = $('input[name=type]:checked').val();

            id = urlParser(id, type);

            $.ajax({
                type: "POST",
                url: "{!! url(getLang() . '/admin/video/get-video-detail') !!}",
                data: {"video_id": id, "type": type},
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                },
                success: function (response) {

                    //console.log(response);
                    $("#video_id").val(response.id);
                    $("#title").val(response.title);

                },
                error: function () {
                    //alert("error");
                }
            });

            return false;
        });
    });
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> Video
        <small> | Add Video</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! url(getLang(). '/admin/video') !!}"><i class="fa fa-play"></i> Video</a></li>
        <li class="active">Add Video</li>
    </ol>
</section>
<br>
<br>
<div class="container">
    <div class="pull-right">
        <div id="msg"></div>
    </div>
    {!! Form::open(array('action' => '\Fully\Http\Controllers\Admin\VideoController@store' )) !!}

    <!-- Type -->
    <label class="control-label" for="type">Type</label>

    <div class="controls">
        <div class="radio">
            <label>
                {!! Form::radio('type', 'youtube', true, array('id'=>'youtube', 'class'=>'type')) !!}
                <span>Youtube</span>
            </label>
        </div>
        <div class="radio">
            <label>
                {!! Form::radio('type', 'vimeo', false, array('id'=>'vimeo', 'class'=>'type')) !!}
                <span>Vimeo</span>
            </label>
        </div>
        <br>
    </div>

    <!-- Video Id -->
    <div class="control-group {!! $errors->has('title') ? 'has-error' : '' !!}">
        <label class="control-label" for="video_id">Video Id</label>

        <div class="controls">
            {!! Form::text('video_id', null, array('class'=>'form-control', 'id' => 'video_id', 'placeholder'=>'Video Id', 'value'=>Input::old('video_id'))) !!}
            @if ($errors->first('video_id'))
            <span class="help-block">{!! $errors->first('video_id') !!}</span>
            @endif
        </div>
    </div>
    <br>

    <!-- Title -->
    <div class="control-group {!! $errors->has('title') ? 'has-error' : '' !!}">
        <label class="control-label" for="title">Title</label>

        <div class="controls">
            {!! Form::text('title', null, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Title', 'value'=>Input::old('title'))) !!}
            @if ($errors->first('title'))
            <span class="help-block">{!! $errors->first('title') !!}</span>
            @endif
        </div>
    </div>
    <br>

    <!-- Form actions -->
    {!! Form::submit('Save Changes', array('class' => 'btn btn-success')) !!}
    <a href="{!! url(getLang() . '/admin/video') !!}" class="btn btn-default">&nbsp;Cancel</a>
    {!! Form::close() !!}
</div>
@stop