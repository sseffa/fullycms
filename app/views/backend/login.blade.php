<!DOCTYPE html>
<html>
<head>
    <title>sf CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <!-- CSS are placed here -->
    {{ HTML::style('bootstrap/css/backend_bootstrap.css') }}
    {{ HTML::style('bootstrap/css/signin.css') }}
</head>

<div class="container">
    {{ Form::open(array('class' => 'form-signin', 'id' => 'form-signin')) }}

    @if ($errors->has('login'))
    <div class="alert alert-danger">
        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>{{ $errors->first('login', ':message') }}
    </div>
    @endif

    <h2 class="form-signin-heading">Please sign in</h2>

    <div class="control-group">
        <div class="controls">
            {{ Form::text('email', null,array('class' => 'form-control', 'placeholder'=>'Email', 'autofocus'=>'')) }}
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            {{ Form::password('password', array('class' => 'form-control','placeholder'=>'Password', 'autofocus'=>'')) }}
        </div>
    </div>
    <label class="checkbox">{{ Form::checkbox('rememberMe', 'rememberMe') }} Remember me</label>
    {{ Form::submit('Sign in', array('class' => 'btn btn-large btn-primary btn-block')) }}
    {{ Form::close() }}
</div>
</body>
</html>
