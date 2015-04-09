@extends('frontend/layout/layout')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {

        $('#notification').show().delay(4000).fadeOut(700);
    });
</script>

<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Contact Us</h1>

                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
            </div>
            <div class="col-sm-6">
                @yield('partial/breadcrumbs', Breadcrumbs::render('contact'))
            </div>
        </div>
    </div>
</section><!--/#title-->

<section id="contact-page" class="container">
    <div class="row">
        <div class="col-sm-8">
            <h4>{!! trans('fully.contact_form') !!}</h4>

            @if(Session::has('notification'))
            <div class="alert alert-success" id="notification">
                {!! Session::get('notification') !!}
            </div>
            @endif
            <div class="status alert alert-success" style="display: none"></div>
            {!! Form::open(array('action' => 'FormPostController@postContact')) !!}
            <div class="row">
                <div class="col-sm-5">

                    <!-- Sender Name Surname -->
                    <div class="control-group {!! $errors->has('sender_name_surname') ? 'has-error' : '' !!}">

                        <div class="form-group">
                            {!! Form::text('sender_name_surname', null, array('class'=>'form-control', 'id' => 'sender_name_surname', 'placeholder'=>trans('fully.name_and_surname'), 'value'=>Input::old('sender_name_surname'))) !!}
                            @if ($errors->first('sender_name_surname'))
                            <span class="help-block">{!! $errors->first('sender_name_surname') !!}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Sender Email -->
                    <div class="control-group {!! $errors->has('sender_email') ? 'has-error' : '' !!}">

                        <div class="form-group">
                            {!! Form::text('sender_email', null, array('class'=>'form-control', 'id' => 'sender_email', 'placeholder'=>trans('fully.email'), 'value'=>Input::old('sender_email'))) !!}
                            @if ($errors->first('sender_email'))
                            <span class="help-block">{!! $errors->first('sender_email') !!}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Sender Phone -->
                    <div class="control-group {!! $errors->has('sender_phone_number') ? 'has-error' : '' !!}">

                        <div class="form-group">
                            {!! Form::text('sender_phone_number', null, array('class'=>'form-control', 'id' => 'sender_phone_number', 'placeholder'=>trans('fully.phone_number'), 'value'=>Input::old('sender_phone_number'))) !!}
                            @if ($errors->first('sender_phone_number'))
                            <span class="help-block">{!! $errors->first('sender_phone_number') !!}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Subject -->
                    <div class="control-group {!! $errors->has('subject') ? 'has-error' : '' !!}">

                        <div class="form-group">
                            {!! Form::text('subject', null, array('class'=>'form-control', 'id' => 'subject', 'placeholder'=>trans('fully.subject'), 'value'=>Input::old('subject'))) !!}
                            @if ($errors->first('subject'))
                            <span class="help-block">{!! $errors->first('subject') !!}</span>
                            @endif
                        </div>
                    </div>

                    {!! Form::submit(trans('fully.button_send'), array('class' => 'btn btn-info')) !!}
                </div>

                <!-- Message -->
                <div class="col-sm-7">
                    <div class="control-group {!! $errors->has('post') ? 'has-error' : '' !!}">

                        <div class="form-group">
                            {!! Form::textarea('message', null, array('class'=>'form-control', 'id' => 'message-content', 'placeholder'=>trans('fully.message'), 'value'=>Input::old('message'), 'rows'=>8)) !!}

                            @if ($errors->first('post'))
                            <span class="help-block">{!! $errors->first('post') !!}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Form actions -->
            </div>
            {!! Form::close() !!}

        </div>
        <!--/.col-sm-8-->
        <div class="col-sm-4">
            <h4>{!! trans('fully.our_location') !!}</h4>
            <iframe width="100%" height="215" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src=""></iframe>
        </div>
        <!--/.col-sm-4-->
    </div>
</section><!--/#contact-page-->
@stop