<!DOCTYPE html>
<html>
<head>
    <title>sf CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <!-- CSS are placed here -->
    {!! HTML::style('assets/bootstrap/css/backend_bootstrap.css') !!}
    {!! HTML::style('assets/bootstrap/css/signin.css') !!}
    {!! HTML::style("assets/css/github-right.css") !!}
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
            <h1 style="color: #FFFFFF">Fully CMS</h1>

            <div class="panel panel-default">
                <div class="panel-body">
                    <h5 class="text-center"><b>Reset Password</b></h5>
                    {!! Form::open(array('url'=>'admin/reset-password', 'class' => 'form-signup', 'id' => 'form-signin')) !!}
                    @if ($errors->count() > 0)  @foreach( $errors->all() as $message )
                    <div class="alert alert-danger">
                           <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>{!! $message !!}
                    </div>
                      @endforeach
                    @endif



                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            {!! Form::password('password', array('class' => 'form-control','placeholder'=>'Password')) !!}
                        </div>
                    </div>

                      <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            {!! Form::password('confirm_password', array('class' => 'form-control','placeholder'=>'Confirm Password')) !!}
                        </div>
                    </div>

                    {!! Form::hidden('id', $id) !!}
                    {!! Form::hidden('code', $code) !!}

                    {!! Form::submit('Save', array('class' => 'btn btn-sm btn-primary btn-block', 'role'=>'button')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
