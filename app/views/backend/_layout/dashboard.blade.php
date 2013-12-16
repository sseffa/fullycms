@extends('backend/_layout/layout')
@section('content')
<div class="container">
<div class="row">
    <div class="col-md-3">
        <a href="#"><strong><i class="glyphicon glyphicon-briefcase"></i> Quick Shortcuts</strong></a>
        <hr>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="{{ route('admin.form-post.index') }}"><i class="glyphicon glyphicon-envelope"></i> Inbox</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-stats"></i> Reports</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-tasks"></i> Logs</a></li>
            <li><a href="{{ route('admin.settings') }}"><i class="glyphicon glyphicon-cog"></i> Settings</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-plus"></i> Advanced</a></li>
        </ul>
        <hr>

    </div>
    <div class="col-md-9">
        <a href="#"><strong><i class="glyphicon glyphicon-briefcase"></i> Modules</strong></a>
         <hr>
          <div class="row">
            <div class="col-xs-6 col-md-12">
                <a href="{{ route('admin.menu.managment') }}" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-list-alt"></span> <br/>Menus</a>
                <a href="{{ route('admin.news.index') }}" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-book"></span> <br/>News</a>
                <a href="{{ route('admin.page.index') }}" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-book"></span> <br/>Pages</a>
                <a href="{{ route('admin.photo_gallery.index') }}" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-picture"></span> <br/>Gallery</a>
                <a href="{{ route('admin.slider.index') }}" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-tint"></span> <br/>Sliders</a>
                <a href="{{ route('admin.user.index') }}" class="btn btn-warning btn-lg" role="button"><span class="glyphicon glyphicon-user"></span> <br/>Users</a>
                <a href="{{ route('admin.form-post.index') }}" class="btn btn-info btn-lg" role="button"><span class="glyphicon glyphicon-envelope"></span> <br/>Inbox</a>
                <a href="{{ route('admin.settings') }}" class="btn btn-default btn-lg" role="button"><span class="glyphicon glyphicon-cog"></span> <br/>Settings</a>
            </div>
            </div>
         <br>
         <br>
            <a href="{{ route('dashboard') }}" class="btn btn-success btn-lg btn-block" role="button"><span class="glyphicon glyphicon-globe"></span> Website</a>
    </div>
</div>
<br>
<br>
     <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Please remember to <a href="#">Logout</a> for classified security.
        </div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#messages" data-toggle="tab">Messages</a></li>
                <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="messages">
                    <h4><i class="glyphicon glyphicon-comment"></i></h4>
                    Message ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                    <p>Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis
                        dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.
                        Aliquam in felis sit amet augue.</p>
                </div>
                <div class="tab-pane" id="settings">
                    <h4><i class="glyphicon glyphicon-cog"></i></h4>
                    Lorem settings dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                    <p>Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis
                        dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.
                        Aliquam in felis sit amet augue.</p>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
@stop