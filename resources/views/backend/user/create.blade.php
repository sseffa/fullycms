@extends('backend/layout/layout')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> User
        <small> | Add User</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! url(getLang(). '/admin/user') !!}"><i class="fa fa-user"></i> User</a></li>
        <li class="active">Add User</li>
    </ol>
</section>
<br>
<br>
<div class="container">
    {!! Form::open(array('action' => '\Fully\Http\Controllers\Admin\UserController@store')) !!}
    
    <!-- First Name -->
    <div class="control-group {!! $errors->has('first-name') ? 'has-error' : '' !!}">
        <label class="control-label" for="first-name">First Name</label>

        <div class="controls">
            {!! Form::text('first_name', null, array('class'=>'form-control', 'id' => 'first_name', 'placeholder'=>'First Name', 'value'=>Input::old('first_name'))) !!}
            @if ($errors->first('first-name'))
            <span class="help-block">{!! $errors->first('first-name') !!}</span>
            @endif
        </div>
    </div>
    <br>
    <!-- Last Name -->
    <div class="control-group {!! $errors->has('last-name') ? 'has-error' : '' !!}">
        <label class="control-label" for="last-name">Last Name</label>

        <div class="controls">
            {!! Form::text('last_name', null, array('class'=>'form-control', 'id' => 'last_name', 'placeholder'=>'Last Name', 'value'=>Input::old('last_name'))) !!}
            @if ($errors->first('last-name'))
            <span class="help-block">{!! $errors->first('last-name') !!}</span>
            @endif
        </div>
    </div>
    <br>
    <!-- Email -->
    <div class="control-group {!! $errors->has('email') ? 'has-error' : '' !!}">
        <label class="control-label" for="email">Email</label>

        <div class="controls">
            {!! Form::text('email', null, array('class'=>'form-control', 'id' => 'email', 'placeholder'=>'Email', 'value'=>Input::old('email'))) !!}
            @if ($errors->first('email'))
            <span class="help-block">{!! $errors->first('email') !!}</span>
            @endif
        </div>
    </div>
    <br>

    <!-- Group -->
    <div class="control-group {!! $errors->has('is_published') ? 'has-error' : '' !!}">
        <label class="control-label" for="groups">Groups</label>
        <div class="controls">

            @foreach($groups as $id=>$group)
            <label class="checkbox"><input type="checkbox" value="{!! $id !!}" name="groups[{!! $group !!}]">  {!! $group !!}</label>
            @endforeach

        </div>
    </div>
    <br>

    <legend>Password</legend>
    <!-- Password -->
    <div class="control-group {!! $errors->has('password') ? 'has-error' : '' !!}">
        <label class="control-label" for="password">Password</label>

        <div class="controls">
            {!! Form::password('password', array('class'=>'form-control', 'id' => 'password', 'placeholder'=>'Password', 'value'=>Input::old('password'))) !!}
            @if ($errors->first('password'))
            <span class="help-block">{!! $errors->first('password') !!}</span>
            @endif
        </div>
    </div>
    <br>
    <!-- Confirm Password -->
    <div class="control-group {!! $errors->has('confirm-password') ? 'has-error' : '' !!}">
        <label class="control-label" for="confirm-password">Confirm Password</label>

        <div class="controls">
            {!! Form::password('confirm_password', array('class'=>'form-control', 'id' => 'confirm_password', 'placeholder'=>'Confirm Password', 'value'=>Input::old('confirm_password'))) !!}
            @if ($errors->first('confirm-password'))
            <span class="help-block">{!! $errors->first('confirm-password') !!}</span>
            @endif
        </div>
    </div>
    <br>
    <!-- Form actions -->
    {!! Form::submit('Save Changes', array('class' => 'btn btn-success')) !!}
    <a href="{!! url('admin/user') !!}"
       class="btn btn-default">
        &nbsp;Cancel
    </a>
    {!! Form::close() !!}
</div>
@stop