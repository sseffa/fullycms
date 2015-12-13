@extends('backend/layout/layout')
@section('content')
    {!! HTML::style('assets/css/style-backend.css') !!}
    <script type="text/javascript">
        $(document).ready(function () {
            $('#levels').change(function () {
                $('#level-form').submit();
            });
        });
    </script>
    <section class="content-header">
        <h1> Logs
            <small> | Log View</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! url(getLang(). '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Log View</li>
        </ol>
    </section>
    <br>
    <div class="container">
        <div class="col-lg-11">
            {!! Form::open(array('route' => 'admin.log', 'id' => 'level-form')) !!}
            <div class="controls">
                {!! Form::select('levels', $levels, $level, array('class'=>'form-control', 'id' => 'levels')) !!}
            </div>
            {!! Form::close() !!}
            <div class="pull-right">
                <ul class="pagination">
                    {!! $paginator->appends(array('levels' => $level))->render() !!}
                </ul>
            </div>
            <br> <br> <br> <br>
            @foreach( array_slice($paginator->toArray()['data'], (($paginator->toArray()['current_page']-1) * $paginator->toArray()['per_page']), $paginator->toArray()['per_page']) as $v )
                <div class="callout callout-{!! ($v['type'] === 'error') ? 'danger' : $v['type'] !!}">
                    {!! $v['log'] !!}
                </div>
            @endforeach
            <div class="pull-right">
                <ul class="pagination">
                    {!! $paginator->render() !!}
                </ul>
            </div>
        </div>
    </div>
@stop
