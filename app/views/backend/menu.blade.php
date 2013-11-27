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

                <li @if(isset($active) && $active=="article") class="active" @endif>{{ HTML::link('/admin/article','Blog') }}</li>
                <li @if(isset($active) && $active=="page") class="active" @endif>{{ HTML::link('/admin/page','Page') }}</li>
                <li @if(isset($active) && $active=="photo_gallery") class="active" @endif>{{ HTML::link('/admin/photo_gallery','Photo Gallery') }}</li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Plugins <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>{{ HTML::link('/admin/home-slider','Home Slider') }}</li>
                    </ul>
                </li>               
                <li @if(isset($active) && $active=="form-post") class="active" @endif>{{ HTML::link('/admin/form-post','Form Post') }}</li>
                 <li @if(isset($active) && $active=="user") class="active" @endif>{{ HTML::link('/admin/user','User') }}</li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                 <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                             class="glyphicon glyphicon-envelope"></span>Inbox <span class="label label-info">32</span>
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
                <li @if(isset($active) && $active=="settings") class="active" @endif>{{ HTML::link('/admin/settings','Settings') }}</li>
                <li>{{ HTML::link('/','[View Site]') }}</li>
                <li>{{ HTML::link('admin/logout','Logout') }}</li>
            </ul>
        </div>
    </div>
</div>