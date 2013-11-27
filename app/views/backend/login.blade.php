<!DOCTYPE html>
<html>
<head>
    <title>sf CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <!-- CSS are placed here -->
    {{ HTML::style('bootstrap/css/backend_bootstrap.css') }}
    {{ HTML::style('bootstrap/css/signin.css') }}
    <style>
        body {
            background-color: #1b1b1b;
            padding-top: 40px;
        }

        .input-group-addon {
            background-color: rgb(50, 118, 177);
            border-color: rgb(40, 94, 142);
            color: rgb(255, 255, 255);
        }

        .form-control:focus {
            background-color: rgb(50, 118, 177);
            border-color: rgb(40, 94, 142);
            color: rgb(255, 255, 255);
        }

        .form-signup input[type="text"], .form-signup input[type="password"] {
            border: 1px solid rgb(50, 118, 177);
        }
    </style>
</head>

<div class="container">
    <div class="row">
        <div style="text-align: center" class="col-md-4 col-md-offset-4">
            <h1 style="color: #FFFFFF">sf CMS</h1>
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5 class="text-center"><b>SIGN UP</b></h5>
                    {{ Form::open(array('class' => 'form-signup', 'id' => 'form-signin')) }}

                    @if ($errors->has('login'))
                    <div class="alert alert-danger">
                    <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>{{ $errors->first('login', ':message') }}
                    </div>
                    @endif

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                            </span>
                            {{ Form::text('email', null,array('class' => 'form-control', 'placeholder'=>'Email', 'autofocus'=>'')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                              {{ Form::password('password', array('class' => 'form-control','placeholder'=>'Password', 'autofocus'=>'')) }}
                        </div>
                    </div>

                     <label style="text-align: left" class="checkbox">{{ Form::checkbox('rememberMe', 'rememberMe') }} Remember me</label>

                 {{ Form::submit('Sign in', array('class' => 'btn btn-sm btn-primary btn-block', 'role'=>'button')) }}
    {{ Form::close() }}
                 <br>
                 {{ HTML::link('/admin','Forgot Password', array('class' => 'btn btn-sm btn-default btn-block')) }}
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
