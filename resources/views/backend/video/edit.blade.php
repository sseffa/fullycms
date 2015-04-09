@extends('backend/layout/layout')
@section('content')
{!! HTML::script('/assets/js/fully.js') !!}
<script type="text/javascript">
    $(document).ready(function () {

        $("#video_id").keyup(function () {
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

        });
    });
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> Video
        <small> | Update Video</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! url(getLang(). '/admin/video') !!}"><i class="fa fa-play"></i> Video</a></li>
        <li class="active">Update Video</li>
    </ol>
</section>
<br>
<br>
<div class="container">

    {!! Form::open( array( 'route' => array(getLang(). '.admin.video.update', $video->id), 'method' => 'PATCH')) !!}

    <!-- Type -->
    <label class="control-label" for="type">Type</label>

    <div class="controls">
        <div class="radio">
            <label>
                {!! Form::radio('type', 'youtube', (($video->type == 'youtube') ? true : false), array('id'=>'youtube', 'class'=>'type')) !!}
                <span>Youtube</span>
            </label>
        </div>
        <div class="radio">
            <label>
                {!! Form::radio('type', 'vimeo', (($video->type == 'vimeo') ? true : false), array('id'=>'vimeo', 'class'=>'type')) !!}
                <span>Vimeo</span>
            </label>
        </div>
        <br>
    </div>

    <!-- Video Id -->
    <div class="control-group {!! $errors->has('title') ? 'has-error' : '' !!}">
        <label class="control-label" for="video_id">Video Id</label>

        <div class="controls">
            {!! Form::text('video_id', $video->video_id, array('class'=>'form-control', 'id' => 'video_id', 'placeholder'=>'Video Id', 'value'=>Input::old('video_id'))) !!}
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
            {!! Form::text('title', $video->title, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Title', 'value'=>Input::old('title'))) !!}
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