<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{ HTML::link('/','sf', array('class' => 'navbar-brand')) }}
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li> {{ HTML::link('/','Home') }}</li>
                <li> {{ HTML::link('/article','Blog') }}</li>
                @foreach(Page::where('is_in_menu', "=", 1)->where('is_published', "=", 1)->paginate(5) as $page)
                <li>{{ link_to_route( 'dashboard.page.show', $page->title, $page->id) }}</li>
                @endforeach
                <li>{{ HTML::link('/admin/login', ((Sentry::check()) ? ( Sentry::getUser()->email) : 'Login')) }}</li>
                @if(Sentry::check())
                <li>{{ HTML::link('admin/logout','Logout') }}</li>
                @endif
            </ul>
        </div>
    </div>
</nav>