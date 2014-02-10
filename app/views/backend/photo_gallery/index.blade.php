@extends('backend/_layout/layout')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {

        $('#notification').show().delay(4000).fadeOut(700);

        // publish settings
        $(".publish").bind("click", function (e) {
            var id = $(this).attr('id');
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ url('/admin/photo_gallery/" + id + "/toggle-publish/') }}",
                success: function (response) {
                    if (response['result'] == 'success') {
                        var imagePath = (response['changed'] == 1) ? "{{url('/')}}/assets/images/publish.png" : "{{url('/')}}/assets/images/not_publish.png";
                        $("#publish-image-" + id).attr('src', imagePath);
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
            <h3 class="panel-title">Photo Galleries</h3>
        </div>
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('admin.photo_gallery.create') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Photo Gallery
                    </a>
                </div>
            </div>
            <br>
            <br>
            <br>
            @if($photo_galleries->count())
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                        <th>Action</th>
                        <th>Settings</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $photo_galleries as $photo_gallery )
                    <tr>
                        <td> {{ link_to_route( 'admin.photo_gallery.show', $photo_gallery->title, $photo_gallery->id, array( 'class' => 'btn btn-link btn-xs' )) }}
                        <td>{{{ $photo_gallery->created_at }}}</td>
                        <td>{{{ $photo_gallery->updated_at }}}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                    Action
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ URL::route('admin.photo_gallery.show', array($photo_gallery->id)) }}">
                                            <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show Photo Gallery
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::route('admin.photo_gallery.edit', array($photo_gallery->id)) }}">
                                            <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Photo Gallery
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ URL::route('admin.photo_gallery.delete', array($photo_gallery->id)) }}">
                                            <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete Photo Gallery
                                        </a>
                                    </li>
                                     <li class="divider"></li>
                                    <li>
                                        <a target="_blank" href="{{ $photo_gallery->url }}">
                                            <span class="glyphicon glyphicon-eye-open"></span>&nbsp;View On Site
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <a href="#" id="{{ $photo_gallery->id }}" class="publish"><img id="publish-image-{{ $photo_gallery->id }}" src="{{url('/')}}/assets/images/{{ ($photo_gallery->is_published) ? 'publish.png' : 'not_publish.png'  }}"/></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="alert alert-danger">No results found</div>
            @endif
        </div>
    </div>

    <div class="pull-left">
        <ul class="pagination">
            {{ $photo_galleries->links() }}
        </ul>
    </div>
</div>
@stop
