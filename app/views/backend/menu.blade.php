<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{ HTML::link('/admin','sf Content Managment System', array('class' => 'navbar-brand')) }}
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li @if(isset($active) && $active=="home") class="active" @endif>{{ HTML::link('/admin','Home') }}</li>
                <li @if(isset($active) && $active=="article") class="active" @endif>{{ HTML::link('/admin/article','Blog') }}</li>
                <li @if(isset($active) && $active=="page") class="active" @endif>{{ HTML::link('/admin/page','Page') }}</li>
                <li @if(isset($active) && $active=="photo_gallery") class="active" @endif>{{ HTML::link('/admin/photo_gallery','Photo Gallery') }}</li>
                <li @if(isset($active) && $active=="user") class="active" @endif>{{ HTML::link('/admin/user','User') }}</li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>{{ HTML::link('/','View Site') }}</li>
                <li>{{ HTML::link('admin/logout','Logout') }}</li>
            </ul>
        </div>
    </div>
</div>