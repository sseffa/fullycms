@extends('backend/layout')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {

        // menu settings
        $(".in-menu").bind("click", function (e) {

            var id = $(this).attr('id');

            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ url('/admin/photo_gallery/" + id + "/toggle-menu/') }}",
                beforeSend: function () {
                    // before send
                },
                success: function (response) {

                    if (response['result'] == 'success') {

                        var imagePath = (response['changed'] == 1) ? "{{url('/')}}/images/menu.png" : "{{url('/')}}/images/not_menu.png";
                        $("#menu-image-" + id).attr('src', imagePath);
                    }
                },
                error: function () {
                    alert("error");
                }
            })
        });

        // publish settings
        $(".publish").bind("click", function (e) {

            var id = $(this).attr('id');

            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ url('/admin/photo_gallery/" + id + "/toggle-publish/') }}",
                beforeSend: function () {
                    // before send
                },
                success: function (response) {

                    if (response['result'] == 'success') {

                        var imagePath = (response['changed'] == 1) ? "{{url('/')}}/images/publish.png" : "{{url('/')}}/images/not_publish.png";
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
    <div class="pull-right">
        {{ HTML::link('/admin/photo_gallery/create/','Create', array('id'=>'create','class'=>'btn btn-default btn-info')) }}
    </div>
    <br>
    <br>
    <br>
    @if($photo_galleries->count())
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th class="span3">Photo Gallery Title</th>
            <th class="span3">Create Date</th>
            <th class="span3">Updated Date</th>
            <th class="span3">Actions</th>
            <th class="span3">Settings</th>
        </tr>
        </thead>
        <tbody>
        @foreach($photo_galleries as $photo_gallery)
        <tr>
            <td>{{{ $photo_gallery->title }}}</td>
            <td> {{{ $photo_gallery->created_at }}}</td>
            <td> {{{ $photo_gallery->updated_at }}}</td>
            <td>
                {{ HTML::link('/admin/photo_gallery/'. $photo_gallery->id .'/edit/','Edit', array('class'=>'btn btn-default btn-xs')) }}
                {{ link_to_route( 'photo_gallery.delete', 'Delete', $photo_gallery->id, array( 'class' => 'btn btn-danger btn-xs' )) }}
                {{ link_to_route( 'admin.photo_gallery.show', 'Show', $photo_gallery->id, array( 'class' => 'btn btn-info btn-xs' )) }}
            </td>
            <td>
                <a href="#" id="{{ $photo_gallery->id }}" class="publish"><img id="publish-image-{{ $photo_gallery->id }}" src="{{url('/')}}/images/{{ ($photo_gallery->is_published) ? 'publish.png' : 'not_publish.png'  }}"/></a>
                <a href="#" id="{{ $photo_gallery->id }}" class="in-menu"><img id="menu-image-{{ $photo_gallery->id }}" src="{{url('/')}}/images/{{ ($photo_gallery->is_in_menu) ? 'menu.png' : 'not_menu.png'  }}"/></a>
            </td>
        </tr>

        @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-danger">No results found</div>
    @endif
    <div class="pull-left">
        <ul class="pagination">
            {{ $photo_galleries->links() }}
        </ul>
    </div>
</div>
@stop
