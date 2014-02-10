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
                <li><a href="{{ url('/admin/menu') }}"><span class="glyphicon glyphicon-list-alt"></span>Menu</a></li>
                <li class="dropdown {{ ((isset($active) && $active=='modules') ? 'active' : '') }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-tint"></span>Modules <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       <li>{{ HTML::link('/admin/news','News') }}</li>
                       <li>{{ HTML::link('/admin/page','Pages') }}</li>
                       <li>{{ HTML::link('/admin/photo_gallery','Photo Gallery') }}</li>
                    </ul>
                </li>
                 <li class="dropdown {{ ((isset($active) && $active=='blog') ? 'active' : '') }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-book"></span>Blog <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>{{ HTML::link('/admin/article','Article') }}</li>
                        <li>{{ HTML::link('/admin/category','Category') }}</li>
                    </ul>
                </li>
                <li class="dropdown {{ ((isset($active) && $active=='plugins') ? 'active' : '') }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-tint"></span>Plugins <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>{{ HTML::link('/admin/slider','Slider Managment') }}</li>
                    </ul>
                </li>
                <li @if(isset($active) && $active=="user") class="active" @endif><a href="{{ url('/admin/user') }}"><span class="glyphicon glyphicon-user"></span>Users</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li @if(isset($active) && $active=="form-post") class="active" @endif><a href="{{ url('/admin/form-post') }}"><span class="glyphicon glyphicon-envelope"></span>Inbox <span class="label label-info">{{ $formPostCount }}</span></a></li>
                <li @if(isset($active) && $active=="logs") class="active" @endif><a href="{{ url('/admin/log') }}"><span class="glyphicon glyphicon-pushpin"></span>Logs</a></li>
                <li @if(isset($active) && $active=="settings") class="active" @endif><a href="{{ url('/admin/settings') }}"><span class="glyphicon glyphicon-cog"></span>Settings</a></li>
                <li><a href="{{ url('/admin/logout') }}"><span class="glyphicon glyphicon-off"></span>Logout</a></li>
            </ul>
        </div>
    </div>
</div>
