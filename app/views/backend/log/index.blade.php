@extends('backend/_layout/layout')
@section('content')
{{ HTML::style('assets/css/style-backend.css') }}
<script type="text/javascript">
    $(document).ready(function () {
        $('#levels').change(function(){
            $('#level-form').submit();
        });
    });
</script>
<div class="container">
    <h2>Logs</h2>
    {{ Form::open(array('action' => 'App\Controllers\Admin\LogController@index', 'id' => 'level-form')) }}
    <div class="controls">
        {{ Form::select('levels', $levels, $level, array('class'=>'form-control', 'id' => 'levels')) }}
    </div>
    {{ Form::close() }}
    <div class="pull-right">
        <ul class="pagination">
            {{ $paginator->appends(array('levels' => $level))->links() }}
        </ul>
    </div>
    <br>
    <br>
    <br>
    <br>
    @foreach( array_slice($paginator->toArray()['data'], (($paginator->getCurrentPage()-1) * $paginator->getPerPage()), $paginator->getPerPage()) as $v )
        <div class="alert alert-{{  $v['type'] }}">
            {{ $v['log'] }}
        </div>
    @endforeach
    <div class="pull-right">
        <ul class="pagination">
            {{ $paginator->links() }}
        </ul>
    </div>
</div>
@stop
