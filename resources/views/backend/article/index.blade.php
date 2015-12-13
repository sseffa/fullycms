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
                    url: "{!! url(getLang() . '/admin/article/" + id + "/toggle-publish/') !!}",
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
        <h1> Article
            <small> | Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Article</li>
        </ol>
    </section>
    <br>

    <div class="container">
        <div class="col-lg-10">
            @include('flash::message')
            <br>

            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{!! langRoute('admin.article.create') !!}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;Add Article </a>
                    <a href="{!! langRoute('admin.category.create') !!}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;Add Category </a>
                </div>
            </div>
            <br> <br> <br>
            @if($articles->count())
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
                        @foreach( $articles as $article )
                            <tr>
                                <td>
                                    <a href="{!! langRoute('admin.article.show', array($article->id)) !!}" class="btn btn-link btn-xs">
                                        {!! $article->title !!} </a>
                                </td>
                                <td>{!! $article->created_at !!}</td>
                                <td>{!! $article->updated_at !!}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                            Action <span class="caret"></span> </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{!! langRoute('admin.article.show', array($article->id)) !!}">
                                                    <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show Article
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{!! langRoute('admin.article.edit', array($article->id)) !!}">
                                                    <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Article
                                                </a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="{!! URL::route('admin.article.delete', array($article->id)) !!}">
                                                    <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete
                                                    Article </a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a target="_blank" href="{!! URL::route('dashboard.article.show', ['slug' => $article->slug]) !!}">
                                                    <span class="glyphicon glyphicon-eye-open"></span>&nbsp;View On Site
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" id="{!! $article->id !!}" class="publish">
                                        <img id="publish-image-{!! $article->id !!}" src="{!! url('/') !!}/assets/images/{!! ($article->is_published) ? 'publish.png' : 'not_publish.png'  !!}"/>
                                    </a>
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
        <div class="pull-left">
            <ul class="pagination">
                {!! $articles->render() !!}
            </ul>
        </div>
    </div>
@stop