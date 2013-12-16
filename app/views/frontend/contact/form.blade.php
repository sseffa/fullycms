@extends('frontend/_layout/layout')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {

        $('#notification').show().delay(4000).fadeOut(700);
    });
</script>
<div class="container">
     <div class="row">

    </div>
       <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Contact</h1>
             @yield('partial/breadcrumbs', Breadcrumbs::render('contact'))
        </div>
    </div>
      <div class="row">
        <div class="box">
          <div class="col-md-8">
            <iframe width="100%" style="border: 1px solid" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src=""></iframe>
          </div>
          <div class="col-md-4">
            <p>Phone: <strong>0-000-000-00-00</strong></p>
            <p>Email: <strong>example@example.com</strong></p>
            <p>Address: <strong>Lorem lipsum<br> 111</strong></p>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    <div class="row">
        <br>
        <h3>Contact Form</h3>
        <br>
        @if(Session::has('notification'))
        <div class="alert alert-success" id="notification">
            {{ Session::get('notification') }}
        </div>
        @endif
        {{ Form::open(array('action' => 'FormPostController@postContact')) }}

        <!-- Sender Name Surname -->
        <div class="control-group {{ $errors->has('sender_name_surname') ? 'has-error' : '' }}">
            <label class="control-label" for="title">Name and Surname</label>

            <div class="controls">
                {{ Form::text('sender_name_surname', null, array('class'=>'form-control', 'id' => 'sender_name_surname', 'placeholder'=>'Name and Surname', 'value'=>Input::old('sender_name_surname'))) }}
                @if ($errors->first('sender_name_surname'))
                <span class="help-block">{{ $errors->first('sender_name_surname') }}</span>
                @endif
            </div>
        </div>
        <br>

        <!-- Sender Email -->
        <div class="control-group {{ $errors->has('sender_email') ? 'has-error' : '' }}">
            <label class="control-label" for="title">Email</label>

            <div class="controls">
                {{ Form::text('sender_email', null, array('class'=>'form-control', 'id' => 'sender_email', 'placeholder'=>'Email', 'value'=>Input::old('sender_email'))) }}
                @if ($errors->first('sender_email'))
                <span class="help-block">{{ $errors->first('sender_email') }}</span>
                @endif
            </div>
        </div>
        <br>

        <!-- Sender Phone -->
        <div class="control-group {{ $errors->has('sender_phone_number') ? 'has-error' : '' }}">
            <label class="control-label" for="title">Phone</label>

            <div class="controls">
                {{ Form::text('sender_phone_number', null, array('class'=>'form-control', 'id' => 'sender_phone_number', 'placeholder'=>'Phone Number', 'value'=>Input::old('sender_phone_number'))) }}
                @if ($errors->first('sender_phone_number'))
                <span class="help-block">{{ $errors->first('sender_phone_number') }}</span>
                @endif
            </div>
        </div>
        <br>

        <!-- Subject -->
        <div class="control-group {{ $errors->has('subject') ? 'has-error' : '' }}">
            <label class="control-label" for="title">Subject</label>

            <div class="controls">
                {{ Form::text('subject', null, array('class'=>'form-control', 'id' => 'subject', 'placeholder'=>'Subject', 'value'=>Input::old('subject'))) }}
                @if ($errors->first('subject'))
                <span class="help-block">{{ $errors->first('subject') }}</span>
                @endif
            </div>
        </div>
        <br>

        <!-- Message -->
        <div class="control-group {{ $errors->has('message') ? 'has-error' : '' }}">
            <label class="control-label" for="title">Message</label>

            <div class="controls">
                {{ Form::textarea('message', null, array('class'=>'form-control', 'id' => 'message-content', 'placeholder'=>'Message', 'value'=>Input::old('message'))) }}
                @if ($errors->first('message'))
                <span class="help-block">{{ $errors->first('message') }}</span>
                @endif
            </div>
        </div>
        <br>

        <!-- Form actions -->
        {{ Form::submit('Send', array('class' => 'btn btn-info')) }}
        {{ Form::close() }}
    </div>
</div>
@stop