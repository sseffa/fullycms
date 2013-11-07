@extends('backend/layout')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {

        $('#message').show().delay(4000).fadeOut(700);

        // publish settings
        $(".publish").bind("click", function (e) {
            var id = $(this).attr('id');
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ url('/admin/article/" + id + "/toggle-publish/') }}",
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
        {{ HTML::link('/admin/article/create/','Create', array('class'=>'btn btn-default btn-info')) }}
    </div>
    <br>
    <br>
    <br>
    @if(Session::has('message'))
    <div class="alert alert-success" id="message">
        {{ Session::get('message') }}
    </div>
    @endif
    @if($articles->count())
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th class="span3">Article Title</th>
            <th class="span3">Create Date</th>
            <th class="span3">Updated Date</th>
            <th class="span3">Actions</th>
            <th class="span3">Settings</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $articles as $article )
        <tr>
            <td> {{{ $article->title }}}</td>
            <td> {{{ $article->created_at }}}</td>
            <td> {{{ $article->updated_at }}}</td>
            <td>
                {{ HTML::link('/admin/article/'. $article->id .'/edit/','Edit', array('class'=>'btn btn-default btn-xs')) }}
                {{ link_to_route( 'article.delete', 'Delete', $article->id, array( 'class' => 'btn btn-danger btn-xs' )) }}
                {{ link_to_route( 'admin.article.show', 'Show', $article->id, array( 'class' => 'btn btn-info btn-xs' )) }}
            </td>
            <td>
                <a href="#" id="{{ $article->id }}" class="publish"><img id="publish-image-{{ $article->id }}" src="{{url('/')}}/images/{{ ($article->is_published) ? 'publish.png' : 'not_publish.png'  }}"/></a>
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
            {{ $articles->links() }}
        </ul>
    </div>
</div>
@stop