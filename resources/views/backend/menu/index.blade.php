@extends('backend/layout/layout')
@section('content')
    {!! HTML::style('assets/css/menu-managment.css') !!}
    {!! HTML::script('assets/js/jquery.nestable.js') !!}
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <script type="text/javascript">
        $(document).ready(function () {

            $('#notification').show().delay(4000).fadeOut(700);

            // publish settings
            $(".publish").bind("click", function (e) {
                var id = $(this).attr('id');
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "{!! url(getLang() . '/admin/menu/" + id + "/toggle-publish/') !!}",
                    headers: {
                        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                    },
                    success: function (response) {
                        if (response['result'] == 'success') {
                            var imagePath = (response['changed'] == 1) ? "{!! url('/') !!}/assets/images/publish_16x16.png" : "{!!url('/')!!}/assets/images/not_publish_16x16.png";
                            $("#publish-image-" + id).attr('src', imagePath);
                        }
                    },
                    error: function () {
                        alert("error");
                    }
                });
            });
        });
    </script>


    <section class="content-header">
        <h1>
            Menu
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('admin.dashboard') !!}">Dashboard</a></li>
            <li class="active">Menu</li>
        </ol>
    </section>

    <br>
    <div class="col-lg-10">
        @include('flash::message')
        <div class="pull-right">
            <div id="msg"></div>
        </div>
        <br> <a href="{!! langRoute('admin.menu.create') !!}" class="btn btn-primary">
            <span class="glyphicon glyphicon-plus"></span>&nbsp;New Menu Item </a> <br>
        <hr>
        <div class="dd" id="nestable">
            {!! $menus !!}
        </div>
        @if($menus === null)
            <div class="alert alert-danger">No results found</div>
        @endif
    </div>

    <script type="text/javascript">
        $(document).ready(function () {

            var updateOutput = function (e) {
                var list = e.length ? e : $(e.target),
                        output = list.data('output');
                if (window.JSON) {

                    var jsonData = window.JSON.stringify(list.nestable('serialize'));

                    //console.log(window.JSON.stringify(list.nestable('serialize')));

                    $.ajax({
                        type: "POST",
                        url: "{!! URL::route('admin.menu.save') !!}",
                        data: {'json': jsonData},
                        headers: {
                            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                        },
                        success: function (response) {

                            //$("#msg").append('<div class="alert alert-success msg-save">Saved!</div>');
                            $("#msg").append('<div class="msg-save" style="float:right; color:red;">Saving!</div>');
                            $('.msg-save').delay(1000).fadeOut(500);
                        },
                        error: function () {
                            alert("error");
                        }
                    });

                } else {
                    alert('error');
                }
            };

            $('#nestable').nestable({
                group: 1
            }).on('change', updateOutput);
        });
    </script>
@stop
