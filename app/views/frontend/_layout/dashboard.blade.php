@extends('frontend/_layout/layout')
@section('content')
{{ HTML::style('assets/bootstrap/css/modern-business.css') }}
{{ HTML::style('assets/bootstrap/css/font-awesome.min.css') }}

@if(isset($images))
    @include('frontend/_layout/slider', $images)
@else
    <div id="myCarousel" class="carousel slide">
      <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide One');"></div>
            <div class="carousel-caption">
              <h1>Modern Business - A Bootstrap 3 Template</h1>
            </div>
          </div>
          <div class="item">
            <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Two');"></div>
            <div class="carousel-caption">
              <h1>Ready to Style &amp; Add Content</h1>
            </div>
          </div>
          <div class="item">
            <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Three');"></div>
            <div class="carousel-caption">
              <h1>Additional Layout Options at <a href="http://startbootstrap.com">http://startbootstrap.com</a></h1>
            </div>
          </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="icon-next"></span>
        </a>
    </div>
@endif
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <h3><i class="icon-ok-circle"></i> Beautifully Simplistic</h3>
                <p>Aenean egestas velit vitae nibh elementum, ac faucibus risus varius. Duis pellentesque mollis semper. Etiam semper, neque sed dapibus pharetra, neque orci lacinia enim, quis sodales felis dui eget tellus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas varius at massa eu fringilla.
                </p>
            </div>
            <div class="col-lg-4 col-md-4">
                <h3><i class="icon-pencil"></i> Free Support & Updates</h3>
                <p>Nunc aliquet rutrum ultricies. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris eget enim interdum arcu scelerisque suscipit. Duis porta, lectus nec commodo bibendum, libero massa tempor quam, ac ullamcorper mauris tortor nec quam. Aenean at ante vitae turpis volutpat cursus. Vestibulum sed est in risus rhoncus lacinia.</p>
            </div>
            <div class="col-lg-4 col-md-4">
                <h3><i class="icon-folder-open-alt"></i> Blissful Layout Options</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum venenatis eu odio a hendrerit. Vivamus urna eros, gravida vitae urna et, sollicitudin interdum est. Suspendisse potenti. Nam aliquet sed turpis quis pharetra. Maecenas sed ultricies justo. Sed sed malesuada est. Donec faucibus elit a elit vestibulum elementum. </p>
            </div>
        </div>
    </div>
</div>
@stop
