@extends('frontend/layout')
@section('content')
{{ HTML::style('/ckeditor/contents.css') }}
{{ HTML::style('/colorbox/colorbox.css') }}
{{ HTML::script('/colorbox/js/jquery.colorbox.js') }}
<script type="text/javascript">
      $(document).ready(function(){
          //Examples of how to assign the Colorbox event to elements
          $(".group1").colorbox({rel:'group1'});
          $(".group2").colorbox({rel:'group2', transition:"fade"});
          $(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
          $(".group4").colorbox({rel:'group4', slideshow:true});
          $(".ajax").colorbox();
          $(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
          $(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
          $(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
          $(".inline").colorbox({inline:true, width:"50%"});
          $(".callbacks").colorbox({
              onOpen:function(){ alert('onOpen: colorbox is about to open'); },
              onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
              onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
              onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
              onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
          });

          $('.non-retina').colorbox({rel:'group5', transition:'none'})
          $('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});

          //Example of preserving a JavaScript event for inline calls.
          $("#click").click(function(){
              $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
              return false;
          });
      });
</script>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><small>{{ $photo_gallery->title }}</small></h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Photo Gallery</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <p class="lead">{{ $photo_gallery->content }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h4>Images</h4>
            @foreach($photos as $photo)
            <a class="group1" href="{{ url($photo->path) }}" title="{{ $photo->title }}"><img style="border-radius: 20px;" class="left" src="{{ url('uploads/150x150_' . $photo->file_name) }}" /></a>
            @endforeach
        </div>
    </div>
</div>
@stop