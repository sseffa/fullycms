@if (Request::is(getLang() . '/admin*'))
    @include('errors/missing_backend')
@else
    @include('errors/missing_frontend')
@endif


