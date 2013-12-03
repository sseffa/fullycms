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
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-tint"></span>Modules <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       <li>{{ HTML::link('/admin/news','News') }}</li>
                       <li>{{ HTML::link('/admin/page','Pages') }}</li>
                    </ul>
                </li>
                 <li class="dropdown  @if(isset($active) && $active=='article') active @endif">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-book"></span>Blog <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>{{ HTML::link('/admin/article','Article') }}</li>
                        <li>{{ HTML::link('/admin/category','Category') }}</li>
                    </ul>
                </li>
                <li @if(isset($active) && $active=="photo_gallery") class="active" @endif><a href="{{ url('/admin/photo_gallery') }}"><span class="glyphicon glyphicon-picture"></span>Photo Gallery</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-tint"></span>Plugins <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>{{ HTML::link('/admin/home-slider','Home Slider') }}</li>
                    </ul>
                </li>
                <li @if(isset($active) && $active=="user") class="active" @endif><a href="{{ url('/admin/user') }}"><span class="glyphicon glyphicon-user"></span>Users</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('/admin/form-post') }}"><span class="glyphicon glyphicon-picture"></span>Inbox <span class="label label-info">{{ getUnansweredMessageCount() }}</span></a></li>
                <li @if(isset($active) && $active=="settings") class="active" @endif><a href="{{ url('/admin/settings') }}"><span class="glyphicon glyphicon-cog"></span>Settings</a></li>
                <li><a href="{{ url('/admin/logout') }}"><span class="glyphicon glyphicon-off"></span>Logout</a></li>
            </ul>
        </div>
    </div>
</div>