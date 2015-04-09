@extends('backend/layout/layout')
@section('content')
{!! HTML::style('assets/css/style-backend.css') !!}
<script type="text/javascript">
    $(document).ready(function () {
        $('#levels').change(function(){
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
<br>
<div class="container">
   coming soon
</div>
@stop
