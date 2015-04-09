@if (Request::is(getLang() . '/admin*'))
    @include('errors/error_backend')
@else
    @include('errors/error_frontend')
@endif



