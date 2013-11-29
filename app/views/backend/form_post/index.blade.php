@extends('backend/_layout/layout')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $('#message').show().delay(4000).fadeOut(700);
    });
</script>
<div class="container">
    @if(Session::has('message'))
    <div class="alert alert-success" id="message">
        {{ Session::get('message') }}
    </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Form Post</h3>
        </div>
        <div class="panel-body">
            <br>

            <div class="table-responsive">
                @if($formPosts->count())
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Sender Name</th>
                        <th>Sender Email</th>
                        <th>Sender Phone Number</th>
                        <th>Subject</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $formPosts as $formPost )
                    <tr>
                        <td>{{{ $formPost->sender_name_surname }}}</td>
                        <td>{{{ $formPost->sender_email }}}</td>
                        <td>{{{ $formPost->sender_phone_number }}}</td>
                        <td>{{{ $formPost->subject }}}</td>
                        <td>
                            </a>

                            <div class="btn-group">
                                <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                    Action
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ URL::route('admin.form-post.show', array($formPost->id)) }}">
                                            <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show Post
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ URL::route('admin.form-post.delete', array($formPost->id)) }}">
                                            <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete Post
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                <div class="alert alert-danger">No results found</div>
                @endif
            </div>
        </div>
    </div>


    <div class="pull-left">
        <ul class="pagination">

    </div>
</div>
@stop