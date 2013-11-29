@extends('backend/_layout/layout')
@section('content')
<div class="container">
<div class="row">
    <div class="col-md-3">
        <a href="#"><strong><i class="glyphicon glyphicon-briefcase"></i> Toolbox</strong></a>
        <hr>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="#"><i class="glyphicon glyphicon-flash"></i> Alerts</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-link"></i> Links</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i> Reports</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-time"></i> Real-time</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-plus"></i> Advanced..</a></li>
        </ul>
        <hr>
            <ul class="nav nav-pills nav-stacked">
            <li class="nav-header"></li>
            <li><a href="#"><i class="glyphicon glyphicon-list"></i> Layouts &amp; Templates</a></li>
            <li class="divider"></li>
            <li><a href="#"><i class="glyphicon glyphicon-briefcase"></i> Toolbox</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-link"></i> Widgets</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i> Reports</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-book"></i> Pages</a></li>
            <li class="divider"></li>
            <li><a href="#"><i class="glyphicon glyphicon-star"></i> Social Media</a></li>
        </ul>
    </div>
    <div class="col-md-9">
        <a href="#"><strong><i class="glyphicon glyphicon-briefcase"></i> Quick Shortcuts</strong></a>
         <hr>
          <div class="row">
            <div class="col-xs-6 col-md-12">
                <a href="#" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-list-alt"></span> <br/>Apps</a>
                <a href="#" class="btn btn-warning btn-lg" role="button"><span class="glyphicon glyphicon-bookmark"></span> <br/>Bookmarks</a>
                <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-signal"></span> <br/>Reports</a>
                <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-comment"></span> <br/>Comments</a>



                <a href="#" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-user"></span> <br/>Users</a>
                <a href="#" class="btn btn-info btn-lg" role="button"><span class="glyphicon glyphicon-file"></span> <br/>Notes</a>
                <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-picture"></span> <br/>Photos</a>
                <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-tag"></span> <br/>Tags</a>
            </div>
            </div>
         <br>
         <br>
            <a href="http://www.jquery2dotnet.com/" class="btn btn-success btn-lg btn-block" role="button"><span class="glyphicon glyphicon-globe"></span> Website</a>
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
                <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                <li><a href="#messages" data-toggle="tab">Messages</a></li>
                <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="profile">
                    <h4><i class="glyphicon glyphicon-user"></i></h4>
                    Lorem profile dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                    <p>Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis
                        dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.
                        Aliquam in felis sit amet augue.</p>
                </div>
                <div class="tab-pane" id="messages">
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