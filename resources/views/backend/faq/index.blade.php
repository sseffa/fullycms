@extends('backend/layout/layout')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $('#notification').show().delay(4000).fadeOut(700);
    });
</script>
<section class="content-header">
    <h1> Faq
        <small> | Control Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! url(getLang(). '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Faq</li>
    </ol>
</section>
<br>
<div class="container">
    <div class="row"> {{ Notification::showAll() }}
        <br>

        <div class="pull-left">
            <div class="btn-toolbar"><a href="{!! langRoute('admin.faq.create') !!}" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span>&nbsp;Add Faq </a></div>
        </div>
        <br>
        <br>
        <br>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Question</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $faqs as $faq )
                <tr>
                    <td>
                        <a href="{!! langRoute('admin.faq.show', array($faq->id)) !!}" class="btn btn-link btn-xs">
                            {!! $faq->question !!}
                        </a>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                Action
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{!! langRoute('admin.faq.show', array($faq->id)) !!}">
                                        <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show Faq
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! langRoute('admin.faq.edit', array( $faq->id)) !!}">
                                        <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Faq
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{!! URL::route('admin.faq.delete', array($faq->id)) !!}">
                                        <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete Faq
                                    </a>
                                </li>

                                <li class="divider"></li>
                                <li>
                                    <a target="_blank" href="{!! $faq->url !!}">
                                        <span class="glyphicon glyphicon-eye-open"></span>&nbsp;View On Site
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
    </div>
    <div class="pull-left">
        <ul class="pagination">
            {!! $faqs->render() !!}
        </ul>
    </div>
</div>
@stop