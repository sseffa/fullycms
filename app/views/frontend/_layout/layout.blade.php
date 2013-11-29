<!DOCTYPE html>
<html>
<head>
    <title>sf</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{ HTML::style('assets/bootstrap/css/bootstrap.css') }}
    {{ HTML::style('assets/css/style.css') }}
    {{ HTML::script('assets/js/jquery.2.0.3.js') }}
    {{ HTML::script('assets/bootstrap/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/holder.js') }}
</head>

<body>
@include('frontend/_layout/menu')
@yield('content')
@include('frontend/_layout/footer')
</body>
</html>
