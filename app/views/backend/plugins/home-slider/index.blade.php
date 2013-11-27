@extends('backend/layout')
@section('content')
<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 999px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        background: red;
        cursor: inherit;
        display: block;
    }
</style>
<script type="text/javascript">
    $(function () {
        var scntDiv = $('.slider-fields');
        var i = 2;

        $('#add').bind('click', function () {

            $('<br><div class="fields' + (i) + '"><input class="form-control" placeholder="Title" id="title' + (i) + '" name="title' + (i) + '" type="text" /><br><input class="btn btn-default btn-file" type="file" /><br><a href="#" class="removeButton" id="'+(i)+'">Remove</a></div>').appendTo(scntDiv);
            i++;
            return false;
        });

        $('.removeButton').bind('click', function () {

            alert("clicked");

            var id = $(this).get('id');
            alert("id: " + id);
            $('fields' + id).remove();

            return false;
        });
    });

</script>
<div class="container">
    <div class="row form-fields">
        <h2>Home Slider</h2>
        {{ Form::open(array('class' => 'form-signup', 'id' => 'form-signin')) }}

        <div class="slider-fields">
            <div class="fields1">
                {{ Form::text('title1', null, array('class'=>'form-control', 'id' => 'title1', 'placeholder'=>'Title')) }}
                <br>
                {{ Form::file('file1', array('class'=>'btn btn-default btn-file')) }}
                <br>
                <a href="#" id="remScnt">Remove</a>
            </div>
            <br>
        </div>
        {{ Form::submit('Save Changes', array('class' => 'btn btn-success')) }}
        {{ Form::close() }}
        <br>
        <button id="add" class="btn add-more" type="button">+</button>
    </div>
</div>
<script type="text/javascript">


</script>
@stop