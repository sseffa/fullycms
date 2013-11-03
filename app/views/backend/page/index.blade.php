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
                url: "{{ url('/admin/page/" + id + "/toggle-menu/') }}",
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
                url: "{{ url('/admin/page/" + id + "/toggle-publish/') }}",
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
        {{ HTML::link('/admin/page/create/','Create', array('id'=>'create','class'=>'btn btn-default btn-info')) }}
    </div>
    <br>
    <br>
    <br>
    @if($pages->count())
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th class="span3">Page Title</th>
            <th class="span3">Create Date</th>
            <th class="span3">Updated Date</th>
            <th class="span3">Actions</th>
            <th class="span3">Settings</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pages as $page)
        <tr>
            <td>{{{ $page->title }}}</td>
            <td> {{{ $page->created_at }}}</td>
            <td> {{{ $page->updated_at }}}</td>
            <td>
                {{ HTML::link('/admin/page/'. $page->id .'/edit/','Edit', array('class'=>'btn btn-default btn-xs')) }}
                {{ link_to_route( 'page.delete', 'Delete', $page->id, array( 'class' => 'btn btn-danger btn-xs' )) }}
                {{ link_to_route( 'admin.page.show', 'Show', $page->id, array( 'class' => 'btn btn-info btn-xs' )) }}
            </td>
            <td>
                <a href="#" id="{{ $page->id }}" class="publish"><img id="publish-image-{{ $page->id }}" src="{{url('/')}}/images/{{ ($page->is_published) ? 'publish.png' : 'not_publish.png'  }}"/></a>
                <a href="#" id="{{ $page->id }}" class="in-menu"><img id="menu-image-{{ $page->id }}" src="{{url('/')}}/images/{{ ($page->is_in_menu) ? 'menu.png' : 'not_menu.png'  }}"/></a>
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
            {{ $pages->links() }}
        </ul>
    </div>
</div>
@stop
