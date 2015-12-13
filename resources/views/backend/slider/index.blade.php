@extends('backend/layout/layout')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $('#notification').show().delay(4000).fadeOut(700);
    });
</script>
<section class="content-header">
    <h1> Slider
        <small> | Control Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! url(getLang(). '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Slider</li>
    </ol>
</section>
<br>
<div class="container">
    <div class="col-lg-10">
        @include('flash::message')
        <br>

        <div class="pull-left">
            <div class="btn-toolbar"><a href="{!! langRoute('admin.slider.create') !!}" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span>&nbsp;Add Slider </a></div>
        </div>
        <br>
        <br>
        <br>
        @if($sliders->count())
        <div class="">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $sliders as $slider )
                <tr>
                    <td>{!! $slider->title !!}</td>
                    <td>{!! $slider->description !!}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                Action
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{!! langRoute('admin.slider.edit', array($slider->id)) !!}">
                                        <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Slider
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{!! URL::route('admin.slider.delete', array($slider->id)) !!}">
                                        <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete Slider
                                    </a>
                                </li>
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
            {!! $sliders->render() !!}
        </ul>
    </div>
</div>
@stop