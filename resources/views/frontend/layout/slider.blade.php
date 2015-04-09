<section id="main-slider" class="no-margin">
    <div class="carousel slide wet-asphalt">
        @if($sliders->count() > 0)
         <ol class="carousel-indicators">
            <?php
            $active = true;
            $i = 0;
            ?>
            @foreach($sliders as $slider)
            <li data-target="#main-slider" data-slide-to="{!! $i++ !!}" class="{!! (($active) ? 'active' : null) !!}"></li>
            <?php $active = false; ?>
            @endforeach
        </ol>
        <div class="carousel-inner">

            <?php $active = true; ?>
            @foreach($sliders as $slider)

            <div class="item {!! (($active) ? 'active' : null) !!}" style='background-image: url("{!! url($slider->path) !!}")'>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="carousel-content centered">
                                <h2 class="animation animated-item-1">{!! $slider->title !!}</h2>

                                <p class="animation animated-item-2">{!! $slider->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.item-->
            <?php $active = false; ?>
            @endforeach
        @else
         <ol class="carousel-indicators">
                <li class="active" data-slide-to="0" data-target="#main-slider"></li>
            </ol>
        <div class="carousel-inner">
                    <div style='background-image: url("{!! url('assets/images/default_slider.png') !!}")' class="item active">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="carousel-content centered" style="margin-top: 265px;">
                                        <h2 class="animation animated-item-1">Lorem ipsum</h2>

                                        <p class="animation animated-item-2">Aenean ornare erat sed semper gravida</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.item-->
                </div>
        @endif
        </div>
        <!--/.carousel-inner-->
    </div>
    <!--/.carousel-->
    <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
        <i class="icon-angle-left"></i>
    </a>
    <a class="next hidden-xs" href="#main-slider" data-slide="next">
        <i class="icon-angle-right"></i>
    </a>
</section><!--/#main-slider-->
