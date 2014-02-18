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

        <div id="nav-main" class="collapse navbar-collapse navbar-ex1-collapse">
           {{ $menus }}
           <div class="col-xs-5 col-sm-3 pull-right">
                <form action={{ url('/search') }} method="GET" class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search"  value="{{ $q or null }}" name="search" id="srch-term">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                </form>
          </div>
        </div>
    </div>
</nav>
<script type="text/javascript">
$('.navbar-nav .menu-item').on('click', function(event) {

    event.stopPropagation();
    var url = $(this).find('a').attr('href');
    console.log(url);
    window.location.href = url;
});

$('.navbar-nav .menu-item').on('mouseover', function(event) {

   $(this).addClass('open');
});

$('.navbar-nav .menu-item').on('mouseleave', function(event) {

   $(this).removeClass('open');
});

$('ul.dropdown-menu [data-toggle=dropdown]').on('mouseover', function(event) {

    // Avoid following the href location when clicking
    event.preventDefault();
    // Avoid having the menu to close when clicking
    event.stopPropagation();
    // If a menu is already open we close it
    //$('ul.dropdown-menu [data-toggle=dropdown]').parent().removeClass('open');
    // opening the one you clicked on
    $(this).parent().addClass('open');

    var menu = $(this).parent().find("ul");
    var menupos = menu.offset();

    if ((menupos.left + menu.width()) + 30 > $(window).width()) {
        var newpos = - menu.width();
    } else {
        var newpos = $(this).parent().width();
    }
    menu.css({ left:newpos });
});
</script>
