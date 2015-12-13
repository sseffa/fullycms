@extends('frontend/layout/layout')
@section('content')
{!! HTML::style('ckeditor/contents.css') !!}
<script type="text/javascript">
    $(document).ready(function () {
        $('#notification').show().delay(4000).fadeOut(700);
    });
</script>
<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Maillist</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Maillist</li>
                </ol>
            </div>
        </div>
    </div>
</section><!--/#title-->

<section class="container">
    @include('flash::message')
    <div class="row">
        <div class="col-xs-6 col-md-4">
            {!! Form::open(array('route' => 'frontend.maillist')) !!}

            <!-- Email -->
            <div class="control-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                <label class="control-label" for="email">Email Address</label>

                <div class="controls">
                    {!! Form::text('email', null, array('class'=>'form-control', 'id' => 'email', 'placeholder'=>'Email Address', 'value'=>Input::old('email'))) !!}
                    @if ($errors->first('email'))
                    <span class="help-block">{!! $errors->first('email') !!}</span>
                    @endif
                </div>
            </div>

            <br>
            <!-- Form actions -->
            {!! Form::submit('Save', array('class' => 'btn btn-success')) !!}
            {!! Form::close() !!}
        </div>
    </div>
</section>
@stop


