<!DOCTYPE html>
<html>
<head>
    <title>sf</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{ HTML::style('bootstrap/css/bootstrap.css') }}
    {{ HTML::style('bootstrap/css/custom_style.css') }}
    {{ HTML::script('bootstrap/js/jquery.2.0.3.js') }}
    {{ HTML::script('bootstrap/js/bootstrap.min.js') }}
    {{ HTML::script('bootstrap/js/holder.js') }}
</head>

<body>
@include('frontend/menu')
@yield('content')
@include('frontend/footer')
</body>
</html>
