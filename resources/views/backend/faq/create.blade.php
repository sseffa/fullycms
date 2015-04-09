@extends('backend/layout/layout')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> Faq
        <small> | Add Faq</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! url(getLang(). '/admin/faq') !!}"><i class="fa fa-question"></i> Faq</a></li>
        <li class="active">Add Faq</li>
    </ol>
</section>
<br>
<br>
<div class="container">

    {!! Form::open(array('action' => '\Fully\Http\Controllers\Admin\FaqController@store')) !!}
    <!-- Question -->
    <div class="control-group {!! $errors->has('question') ? 'has-error' : '' !!}">
        <label class="control-label" for="question">Question</label>

        <div class="controls">
            {!! Form::text('question', null, array('class'=>'form-control', 'id' => 'question', 'placeholder'=>'Question', 'value'=>Input::old('question'))) !!}
            @if ($errors->first('question'))
            <span class="help-block">{!! $errors->first('question') !!}</span>
            @endif
        </div>
    </div>
    <br>

    <!-- Answer -->
    <div class="control-group {!! $errors->has('answer') ? 'has-error' : '' !!}">
        <label class="control-label" for="answer">Answer</label>

        <div class="controls">
            {!! Form::textarea('answer', null, array('class'=>'form-control', 'id' => 'answer', 'placeholder'=>'Answer', 'value'=>Input::old('answer'))) !!}
            @if ($errors->first('answer'))
            <span class="help-block">{!! $errors->first('answer') !!}</span>
            @endif
        </div>
    </div>
    <br>
    <!-- Form actions -->
    {!! Form::submit('Save Changes', array('class' => 'btn btn-success')) !!}
    <a href="{!! url(getLang(). '/admin/faq') !!}" class="btn btn-default">&nbsp;Cancel</a>
    {!! Form::close() !!}
</div>
@stop