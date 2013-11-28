{{ HTML::style('assets/bootstrap/css/backend_bootstrap.css') }}
{{ HTML::style('assets/bootstrap/css/theme.css') }}
<style>
    .center {text-align: center; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto;}
</style>
<div class="container">
    <div class="row">
        <div class="span12">
            <div class="hero-unit center">
                <h1 style="font-size: 120px;">Oops!</h1>
                <h1><font face="Tahoma" color="red">Error</font></small></h1>
                <br/>
                <p>Error Message: <b>{{ $error }}</b></p>
                @if (Request::is('admin/*'))
                <a href="{{ url('/admin') }}" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Take Me Home</a>
                @else
                <a href="{{ url('/') }}" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Take Me Home</a>
                @endif
            </div>
        </div>
    </div>
</div>