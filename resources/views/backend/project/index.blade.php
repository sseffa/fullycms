@extends('backend/layout/layout')
@section('content')
    <script type="text/javascript">
        $(document).ready(function () {

            $('#notification').show().delay(4000).fadeOut(700);
        });
    </script>
    <section class="content-header">
        <h1> Project
            <small> | Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! url(getLang(). '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Project</li>
        </ol>
    </section>
    <br>
    <div class="container">
        <div class="row"> {{ Notification::showAll() }}
            <br>

            <div class="pull-left">
                <div class="btn-toolbar"><a href="{!! langRoute('admin.project.create') !!}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;Add Project </a></div>
            </div>
            <br> <br> <br>
            @if($projects->count())
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Created Date</th>
                            <th>Updated Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $projects as $project )
                            <tr>
                                <td> {!! link_to_route(getLang(). '.admin.project.show', $project->title, $project->id,
                                    array( 'class' => 'btn btn-link btn-xs' )) !!}
                                </td>
                                <td>{!! $project->created_at !!}</td>
                                <td>{!! $project->updated_at !!}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                            Action <span class="caret"></span> </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{!! langRoute('admin.project.show', array($project->id)) !!}">
                                                    <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show Project
                                                </a></li>
                                            <li><a href="{!! langRoute('admin.project.edit', array($project->id)) !!}">
                                                    <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Project
                                                </a></li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="{!! URL::route('admin.project.delete', array($project->id)) !!}">
                                                    <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete
                                                    Project </a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a target="_blank" href="{!! URL::route('dashboard.project.show', array('slug' => $project->slug)) !!}">
                                                    <span class="glyphicon glyphicon-eye-open"></span>&nbsp;View On Site
                                                </a></li>
                                        </ul>
                                    </div>
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
                {!! $projects->render() !!}
            </ul>
        </div>
    </div>
@stop