@extends('backend/layout/layout')
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
                    url: "{!! url(getLang() . '/admin/news/" + id + "/toggle-publish/') !!}",
                    headers: {
                        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                    },
                    success: function (response) {
                        if (response['result'] == 'success') {
                            var imagePath = (response['changed'] == 1) ? "{!!url('/')!!}/assets/images/publish.png" : "{!!url('/')!!}/assets/images/not_publish.png";
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

    <section class="content-header">
        <h1>
            News
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('admin.dashboard') !!}">Dashboard</a></li>
            <li class="active">News</li>
        </ol>
    </section>


    <br>
    <div class="container">
        <div class="col-lg-10">
            @include('flash::message')
            <br>

            <div class="pull-left">
                <div class="btn-toolbar"><a href="{!! langRoute('admin.news.create') !!}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;Add News </a></div>
            </div>
            <br> <br> <br>
            @if($news->count())
                <div class="">
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
                        @foreach($news as $v )
                            <tr>
                                <td> {!! link_to_route(getLang(). '.admin.news.show', $v->title, $v->id, array( 'class'
                                    => 'btn btn-link btn-xs' )) !!}
                                </td>
                                <td>{!! $v->created_at !!}</td>
                                <td>{!! $v->updated_at !!}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                            Action <span class="caret"></span> </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{!! langRoute('admin.news.show', array($v->id)) !!}">
                                                    <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show News
                                                </a></li>
                                            <li><a href="{!! langRoute('admin.news.edit', array($v->id)) !!}">
                                                    <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit News </a>
                                            </li>
                                            <li class="divider"></li>
                                            <li><a href="{!! URL::route('admin.news.delete', array($v->id)) !!}">
                                                    <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete
                                                    News </a></li>
                                            <li class="divider"></li>
                                            <li>
                                                <a target="_blank" href="{!! URL::route('dashboard.news.show', ['slug' => $v->slug]) !!}">
                                                    <span class="glyphicon glyphicon-eye-open"></span>&nbsp;View On Site
                                                </a></li>
                                        </ul>
                                    </div>
                                </td>
                                <td><a href="#" id="{!! $v->id !!}" class="publish">
                                        <img id="publish-image-{!! $v->id !!}" src="{!!url('/')!!}/assets/images/{!! ($v->is_published) ? 'publish.png' : 'not_publish.png'  !!}"/>
                                    </a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-danger">No results found</div>
            @endif </div>
        <div class="pull-left">
            <ul class="pagination">
                {!! $news->render() !!}
            </ul>
        </div>
    </div>
@stop