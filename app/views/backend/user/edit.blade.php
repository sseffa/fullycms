@extends('backend/layout')
@section('content')
<div class="container">
    <div class="page-header">
        <h3>
            User Update
            <div class="pull-right">
                <button class="btn btn-primary" type="submit">Back</button>
            </div>
        </h3>
    </div>
    {{ Form::open( array( 'route' => array( 'admin.user.update', $user->id), 'method' => 'PATCH')) }}
    <!-- First Name -->
    <div class="control-group {{ $errors->has('first-name') ? 'has-error' : '' }}">
        <label class="control-label" for="first-name">First Name</label>

        <div class="controls">
            {{ Form::text('first_name', $user->first_name, array('class'=>'form-control', 'id' => 'first_name', 'placeholder'=>'First Name', 'value'=>Input::old('first_name'))) }}
            @if ($errors->first('first-name'))
            <span class="help-block">{{ $errors->first('first-name') }}</span>
            @endif
        </div>
    </div>
    <br>
    <!-- Last Name -->
    <div class="control-group {{ $errors->has('last-name') ? 'has-error' : '' }}">
        <label class="control-label" for="last-name">Last Name</label>

        <div class="controls">
            {{ Form::text('last_name', $user->last_name, array('class'=>'form-control', 'id' => 'last_name', 'placeholder'=>'Last Name', 'value'=>Input::old('last_name'))) }}
            @if ($errors->first('last-name'))
            <span class="help-block">{{ $errors->first('last-name') }}</span>
            @endif
        </div>
    </div>
    <br>
    <!-- Email -->
    <div class="control-group {{ $errors->has('email') ? 'has-error' : '' }}">
        <label class="control-label" for="email">Email</label>

        <div class="controls">
            {{ Form::text('email', $user->email, array('class'=>'form-control', 'id' => 'email', 'placeholder'=>'Email', 'value'=>Input::old('email'))) }}
            @if ($errors->first('email'))
            <span class="help-block">{{ $errors->first('email') }}</span>
            @endif
        </div>
    </div>
    <br>
    <!-- Form actions -->
    {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
    {{ Form::close() }}
</div>
@stop