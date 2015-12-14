@extends('backend/layout/layout')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> User
        <small> | Update User</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! url(getLang(). '/admin/user') !!}"><i class="fa fa-user"></i> User</a></li>
        <li class="active">Update User</li>
    </ol>
</section>
<br>
<br>
<div class="container">

    {!! Form::open( array( 'route' => array(getLang(). '.admin.user.update', $user->id), 'method' => 'PATCH')) !!}
    <!-- First Name -->
    <div class="control-group {!! $errors->has('first-name') ? 'has-error' : '' !!}">
        <label class="control-label" for="first-name">First Name</label>

        <div class="controls">
            {!! Form::text('first_name', $user->first_name, array('class'=>'form-control', 'id' => 'first_name', 'placeholder'=>'First Name', 'value'=>Input::old('first_name'))) !!}
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
            {!! Form::text('last_name', $user->last_name, array('class'=>'form-control', 'id' => 'last_name', 'placeholder'=>'Last Name', 'value'=>Input::old('last_name'))) !!}
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
            {!! Form::text('email', $user->email, array('class'=>'form-control', 'id' => 'email', 'placeholder'=>'Email', 'value'=>Input::old('email'))) !!}
            @if ($errors->first('email'))
            <span class="help-block">{!! $errors->first('email') !!}</span>
            @endif
        </div>
    </div>
    <br>

    <!-- Role -->
    <div class="control-group {!! $errors->has('is_published') ? 'has-error' : '' !!}">
        <label class="control-label" for="groups">Roles</label>
        <div class="controls">

            @foreach($roles as $id=>$role)
            <label><input {!! ((in_array($role, $userRoles)) ? 'checked' : '') !!} type="checkbox" value="{!! $id !!}" name="groups[{!! $role !!}]">  {!! $role !!}</label>
            @endforeach

        </div>
    </div>
    <br>

    <!-- Form actions -->
    {!! Form::submit('Save Changes', array('class' => 'btn btn-success')) !!}
    <a href="{!! url(getLang() . '/admin/user') !!}"
       class="btn btn-default">
        &nbsp;Cancel
    </a>
    {!! Form::close() !!}
</div>

@stop