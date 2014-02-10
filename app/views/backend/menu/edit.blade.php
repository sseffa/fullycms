@extends('backend/_layout/layout')
@section('content')
<script type="text/javascript">
$(document).ready(function(){

    $('.type').change(function(){
            var selected = $('input[class="type"]:checked').val();
            if(selected == "custom"){
                $('.modules').css('display', 'none');
                $('.url').css('display', 'block');
            }
            else {
                $('.modules').css('display', 'block');
                $('.url').css('display', 'none');
            }
        }
    );

    $(".type").trigger("change");
});
</script>
<div class="container">
    {{ Notification::showAll() }}
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Add Menu</h3>
        </div>
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ url('admin/menu') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                    </a>
                </div>
            </div>
            <br>
            <br>
            <br>
            {{ Form::open( array( 'action' => array( 'App\Controllers\Admin\MenuController@update', $menu->id), 'method' => 'PATCH')) }}
            <!-- Title -->
            <div class="control-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label class="control-label" for="title">Title</label>

                <div class="controls">
                    {{ Form::text('title', $menu->title, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Title', 'value'=>Input::old('title'))) }}
                    @if ($errors->first('title'))
                    <span class="help-block">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <br>
            </div>

            <!-- Type -->
            <label class="control-label" for="title">Type</label>
            <div class="controls">
                <div class="radio">
                    <label>
                        {{ Form::radio('type', 'module', (($menu->type == 'module') ? true : false), array('id'=>'module', 'class'=>'type')) }}
                        <span>Module</span>
                    </label>
                </div>
                <div class="radio">
                    <label>
                        {{ Form::radio('type', 'custom', (($menu->type == 'custom') ? true : false), array('id'=>'custom', 'class'=>'type')) }}
                        <span>Custom</span>
                    </label>
                </div>
                <br>
            </div>

            <!-- Modules -->
             <div class="control-group {{ $errors->has('options') ? 'has-error' : '' }} modules">
                <label class="control-label" for="title">Options</label>

                <div class="controls">
                    {{ Form::select('option', $options, $menu->option, array('class'=>'form-control', 'id' => 'options', 'value'=>Input::old('options'))) }}
                    @if ($errors->first('options'))
                    <span class="help-block">{{ $errors->first('options') }}</span>
                    @endif
                </div>
                <br>
            </div>

            <!-- URL -->
            <div style="display:none" class="control-group {{ $errors->has('url') ? 'has-error' : '' }} url">
                <label class="control-label" for="first-name">URL</label>
                <div class="controls">
                    {{ Form::text('url',$menu->url, array('class'=>'form-control', 'id' => 'url', 'placeholder'=>'Url', 'value'=>Input::old('url'))) }}
                    @if ($errors->first('url'))
                    <span class="help-block">{{ $errors->first('url') }}</span>
                    @endif
                </div>
            </div>
            <br>
            <!-- Form actions -->
            {{ Form::submit('Save Changes', array('class' => 'btn btn-success')) }}
            <a href="{{ url('admin/menu') }}" class="btn btn-default">&nbsp;Cancel</a>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop
