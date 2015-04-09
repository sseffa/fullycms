<section id="recent-works">
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <h3>Our Latest Project</h3>

                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                <div class="btn-group">
                    <a class="btn btn-danger" href="#scroller" data-slide="prev"><i class="icon-angle-left"></i></a>
                    <a class="btn btn-danger" href="#scroller" data-slide="next"><i class="icon-angle-right"></i></a>
                </div>
                <p class="gap"></p>
            </div>
            <div class="col-md-9">
                <div id="scroller" class="carousel slide">
                    <div class="carousel-inner">

                        <?php $active = "active"; ?>
                        @foreach(array_chunk($projects->all(), 3) as $row)
                        <div class="item {!! $active !!}">
                            <div class="row">
                                @foreach($row as $item)
                                <div class="col-xs-4">
                                    <div class="portfolio-item">
                                        <div class="item-inner">
                                            @if($item->path)
                                            <img class="img-responsive" src="{!! url($item->path . 'thumb_' . $item->file_name) !!}" alt="">
                                            @else
                                            <img class="img-responsive" src="{!! url('assets/images/project_thumb.png') !!}" alt="">
                                            @endif
                                            <h5>
                                                {!! $item->title !!}
                                            </h5>

                                            <div class="overlay">
                                                <a class="preview btn btn-danger" title="Malesuada fames ac turpis egestas" href="{!! url($item->path) !!}" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <?php $active = ""; ?>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <!--/.row-->
    </div>
</section><!--/#recent-works-->
