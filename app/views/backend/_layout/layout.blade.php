<!DOCTYPE html>
<html>
<head>
    <title>sf CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS are placed here -->
    {{ HTML::style('assets/bootstrap/css/backend_bootstrap.css') }}
    {{ HTML::style('assets/bootstrap/css/theme.css') }}
    {{ HTML::script('assets/js/jquery.2.0.3.js') }}
    {{ HTML::script('assets/bootstrap/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/holder.js') }}
    <style>
        @section('styles')
			body {
                 padding-top: 100px;
			}
        @show
    </style>
</head>
<body>
@include('backend/_layout/menu')
@yield('content')
@include('backend/_layout/footer')
<div class="modal" id="addWidgetModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Add Widget</h4>
            </div>
            <div class="modal-body">
                <p>Add a widget stuff here..</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn">Close</a>
                <a href="#" class="btn btn-primary">Save changes</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
