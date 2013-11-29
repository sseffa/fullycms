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
                <li> {{ HTML::link('/news','News') }}</li>
                <li> {{ HTML::link('/article','Blog') }}</li>
                @foreach(Page::where('is_in_menu', "=", 1)->where('is_published', "=", 1)->paginate(5) as $page)
                <li>{{ link_to_route( 'dashboard.page.show', e($page->title), $page->id) }}</li>
                @endforeach
                @foreach(PhotoGallery::where('is_in_menu', "=", 1)->where('is_published', "=", 1)->paginate(5) as $photo_gallery)
                <li>{{ link_to_route( 'dashboard.photo_gallery.show', e($photo_gallery->title), $photo_gallery->id) }}</li>
                @endforeach
                <li> {{ HTML::link('/contact','Contact') }}</li>  
            </ul>
        </div>
    </div>
</nav>