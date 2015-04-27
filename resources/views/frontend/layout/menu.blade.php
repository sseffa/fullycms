<header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{!! url('/' . getLang()) !!}"><img src="{!! url('frontend/images/logo.png') !!}" alt="logo"></a>
        </div>
        <div class="collapse navbar-collapse">
            {!! $menus !!}
        </div>
    </div>
</header><!--/header-->