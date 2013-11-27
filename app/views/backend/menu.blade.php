<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{ HTML::link('/admin','sf CMS', array('class' => 'navbar-brand')) }}
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li @if(isset($active) && $active=="home") class="active" @endif><a href="{{ url('/admin') }}"><span class="glyphicon glyphicon-home"></span>Dashboard</a></li>

                <li class="dropdown  @if(isset($active) && $active=='article') active @endif">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-book"></span>Blog <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>{{ HTML::link('/admin/article','Blog') }}</li>
                        <li>{{ HTML::link('/admin/category','Category') }}</li>
                    </ul>
                </li>

                <li @if(isset($active) && $active=="page") class="active" @endif><a href="{{ url('/admin/page') }}"><span class="glyphicon glyphicon-file"></span>Page</a></li>

                <li @if(isset($active) && $active=="photo_gallery") class="active" @endif><a href="{{ url('/admin/photo_gallery') }}"><span class="glyphicon glyphicon-picture"></span>Photo Gallery</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-tint"></span>Plugins <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>{{ HTML::link('/admin/home-slider','Home Slider') }}</li>
                    </ul>
                </li>

                <li @if(isset($active) && $active=="form-post") class="active" @endif><a href="{{ url('/admin/form-post') }}"><span class="glyphicon glyphicon-list-alt"></span>Form Posts</a></li>

                <li @if(isset($active) && $active=="user") class="active" @endif><a href="{{ url('/admin/user') }}"><span class="glyphicon glyphicon-user"></span>User</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                 <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                             class="glyphicon glyphicon-envelope"></span>Inbox <span class="label label-info">7</span>
                </a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><span class="label label-warning">4:00 AM</span>Favourites Snippet</a></li>
                        <li><a href="#"><span class="label label-warning">4:30 AM</span>Email marketing</a></li>
                        <li><a href="#"><span class="label label-warning">5:00 AM</span>Subscriber focused email
                            design</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="text-center">View All</a></li>
                    </ul>
                </li>

                 <li @if(isset($active) && $active=="settings") class="active" @endif><a href="{{ url('/admin/settings') }}"><span class="glyphicon glyphicon-cog"></span>Settings</a></li>
                <li><a href="{{ url('/admin/logout') }}"><span class="glyphicon glyphicon-off"></span>Logout</a></li>
            </ul>
        </div>
    </div>
</div>