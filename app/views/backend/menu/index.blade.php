@extends('backend/_layout/layout')
@section('content')
{{ HTML::style('assets/css/menu-managment.css') }}
{{ HTML::script('assets/js/jquery.nestable.js') }}
<script type="text/javascript">
    $(document).ready(function () {

        $('#notification').show().delay(4000).fadeOut(700);

        // publish settings
        $(".publish").bind("click", function (e) {
            var id = $(this).attr('id');
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ url('/admin/menu/" + id + "/toggle-publish/') }}",
                success: function (response) {
                    if (response['result'] == 'success') {
                        var imagePath = (response['changed'] == 1) ? "{{url('/')}}/assets/images/publish_16x16.png" : "{{url('/')}}/assets/images/not_publish_16x16.png";
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
<div class="container">
    {{ Notification::showAll() }}
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Menu Items</h3>
        </div>
        <div class="panel-body">
            <div id="msg">

            </div>
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('admin.menu.create') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Menu Item
                    </a>
                </div>
            </div>
            <br>
            <br>
            <hr>
            <div class="dd" id="nestable">
                {{ $menus }}
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function () {

    var updateOutput = function (e) {
        var list = e.length ? e : $(e.target),
        output = list.data('output');
        if (window.JSON) {

            var jsonData=window.JSON.stringify(list.nestable('serialize'));

            //console.log(window.JSON.stringify(list.nestable('serialize')));

            $.ajax({
                type: "POST",
                url: "{{ url('/admin/menu/save') }}",
                data: {'json' : jsonData},
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
</div>
@stop
