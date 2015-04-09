@extends('backend/layout/layout')
@section('content')
{!! HTML::script('ckeditor/ckeditor.js') !!}
{!! HTML::style('dropzone/css/basic.css') !!}
{!! HTML::style('dropzone/css/dropzone.css') !!}
{!! HTML::script('dropzone/dropzone.js') !!}
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> Photo Gallery <small> | Add Photo Gallery</small> </h1>
    <ol class="breadcrumb">
        <li><a href="{!! url(getLang(). '/admin/photo-gallery') !!}"><i class="fa fa-desktop"></i> Photo Gallery</a></li>
        <li class="active">Add Photo Gallery</li>
    </ol>
</section>
<br>
<br>
<div class="container">
    <!-- Dropzone -->
    <label class="control-label" for="title">Images</label>

    <div style="width: 700px; min-height: 300px; height: auto; border:1px solid slategray;" id="dropzone">
        {!! Form::open(array('url' => getLang() . '/admin/photo-gallery/upload/' . $photo_gallery->id, 'class'=>'dropzone', 'id'=>'my-dropzone')) !!}
        <!-- Single file upload
        <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
        -->
        <!-- Multiple file upload-->
        <div class="fallback">
            <input name="file" type="file" multiple/>
        </div>
        <br>
        <br>
        {!! Form::close() !!}
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            // myDropzone is the configuration for the element that has an id attribute
            // with the value my-dropzone (or myDropzone)
            Dropzone.options.myDropzone = {
                init: function () {
                    this.on("addedfile", function (file) {

                        var removeButton = Dropzone.createElement('<a class="dz-remove">Remove file</a>');
                        var _this = this;

                        removeButton.addEventListener("click", function (e) {
                            e.preventDefault();
                            e.stopPropagation();

                            var fileInfo = new Array();
                            fileInfo['name'] = file.name;

                            $.ajax({
                                type: "POST",
                                url: "{!! url(getLang() . '/admin/photo-gallery-delete-image') !!}",
                                headers: {
                                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                                },
                                data: {file: file.name},
                                success: function (response) {

                                    if (response == 'success') {

                                        //alert('deleted');
                                    }
                                },
                                error: function () {
                                    alert("error");
                                }
                            });

                            _this.removeFile(file);

                            // If you want to the delete the file on the server as well,
                            // you can do the AJAX request here.
                        });

                        // Add the button to the file preview element.
                        file.previewElement.appendChild(removeButton);
                    });
                }
            };

            var myDropzone = new Dropzone("#dropzone .dropzone");
            Dropzone.options.myDropzone = false;
            @foreach($photo_gallery->photos as $photo)

            // Create the mock file:
            var mockFile = { name: "{!! $photo->file_name !!}", size: "{!! $photo->file_size !!}" };

            // Call the default addedfile event handler
            myDropzone.emit("addedfile", mockFile);

            // And optionally show the thumbnail of the file:
            myDropzone.emit("thumbnail", mockFile, "{!! url($photo->path) !!}");

            @endforeach
        });
    </script>

    <br>
    {!! Form::open( array( 'route' => array( getLang() . '.admin.photo-gallery.update', $photo_gallery->id), 'method' => 'PATCH', 'files'=>true)) !!}
    <!-- Title -->
    <div class="control-group {!! $errors->has('title') ? 'has-error' : '' !!}">
        <label class="control-label" for="title">Title</label>

        <div class="controls">
            {!! Form::text('title', $photo_gallery->title, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Title', 'value'=>Input::old('title'))) !!}
            @if ($errors->first('title'))
            <span class="help-block">{!! $errors->first('title') !!}</span>
            @endif
        </div>
    </div>
    <br>
    <!-- Content -->
    <div class="control-group {!! $errors->has('content') ? 'has-error' : '' !!}">
        <label class="control-label" for="title">Content</label>

        <div class="controls">
            {!! Form::textarea('content', $photo_gallery->content, array('class'=>'form-control', 'id' => 'content', 'placeholder'=>'Content', 'value'=>Input::old('content'))) !!}
            @if ($errors->first('content'))
            <span class="help-block">{!! $errors->first('content') !!}</span>
            @endif
        </div>
    </div>
    <br>
    <!-- Published -->
    <div class="control-group {!! $errors->has('is_published') ? 'has-error' : '' !!}">

        <div class="controls">
            <label class="checkbox">{!! Form::checkbox('is_published', 'is_published',$photo_gallery->is_published) !!} Publish ?</label>
            @if ($errors->first('is_published'))
            <span class="help-block">{!! $errors->first('is_published') !!}</span>
            @endif
        </div>
    </div>
    <br>
    <!-- Form actions -->
    {!! Form::submit('Update', array('class' => 'btn btn-success')) !!}
    {!! Form::close() !!}
    <script type="text/javascript">
        window.onload = function () {
            CKEDITOR.replace('content', {
                "filebrowserBrowseUrl": "{!! url('filemanager/show') !!}"
            });
        };
    </script>
</div>
@stop
