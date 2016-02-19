@extends('backend/layout/layout')
@section('content')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1> Faq
        <small> | Show Faq</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! langRoute('admin.faq.index') !!}"><i class="fa fa-question"></i> Faq</a></li>
        <li class="active">Show Faq</li>
    </ol>
</section>
<br>
<br>
<div class="container">
    <div class="col-lg-10">
        <div class="pull-left">
            <div class="btn-toolbar">
                <a href="{!! langRoute('admin.faq.index') !!}"
                   class="btn btn-primary"> <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back </a>
            </div>
        </div>
        <br> <br> <br>
        <table class="table table-striped">
            <tbody>
            <tr>
                <td><strong>Question</strong></td>
                <td>{!! $faq->question !!}</td>
            </tr>
            <tr>
                <td><strong>Answer</strong></td>
                <td>{!! $faq->answer !!}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@stop