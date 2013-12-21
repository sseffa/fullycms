@extends('backend/_layout/layout')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $('#notification').show().delay(4000).fadeOut(700);

        // answer settings
        $(".answer").bind("click", function (e) {
            var id = $(this).attr('id');
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ url('/admin/form-post/" + id + "/toggle-answer/') }}",
                success: function (response) {
                    if (response['result'] == 'success') {
                        var imagePath = (response['changed'] == 1) ? "{{url('/')}}/assets/images/answered.png" : "{{url('/')}}/assets/images/not_answered.png";
                        $("#answer-image-" + id).attr('src', imagePath);
                    }
                },
                error: function () {
                    alert("error");
                }
            })
        });
    });
</script>
<div class="container">
    {{ Notification::showAll() }}
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Form Posts</h3>
        </div>
        <div class="panel-body">
            <br>

            <div class="table-responsive">
                @if($formPosts->count())
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Subject</th>
                        <th>Action</th>
                        <th>Settings</th>
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
                        <td>
                            <a href="#" id="{{ $formPost->id }}" class="answer">
                                <img id="answer-image-{{ $formPost->id }}" src="{{url('/')}}/assets/images/{{ ($formPost->is_answered) ? 'answered.png' : 'not_answered.png'  }}"/>
                            </a>
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