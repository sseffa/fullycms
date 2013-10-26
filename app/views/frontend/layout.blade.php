<!DOCTYPE html>
<html>
<head>
    <title>sf</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{ HTML::style('bootstrap/css/bootstrap.css') }}
    <style>
        @section('styles')
			body {
				padding-top: 100px;
			}
        @show
    </style>
</head>

<body>
@include('frontend/menu')
@yield('content')
@include('frontend/footer')
{{ HTML::script('assets/js/jquery.js') }}
{{ HTML::script('bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('bootstrap/js/holder.js') }}
</body>
</html>
