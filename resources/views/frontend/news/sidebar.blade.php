<aside  class="col-sm-4 col-sm-push-8">
@include('frontend/elements/search')
    <div class="widget">
       <a href="{!! route('rss') !!}"> <img src="{!! url('assets/images/rss_button.png') !!}" /></a>
    </div>
    <div style="clear: both"></div>
    <div class="widget categories">
        <h3>Latest News</h3>

        <div class="row">
            <div class="col-sm-12">
             @foreach($news as $item)

                        @if($item->path && $item->file_name)
                            <a href="{!! URL::route('dashboard.news.show', array('slug'=>$item->slug)) !!}"></a>
                        @else
                            <a href="{!! URL::route('dashboard.news.show', array('slug'=>$item->slug)) !!}"></a>
                        @endif


                        <a href="{!! URL::route('dashboard.news.show', array('slug'=>$item->slug)) !!}">{!! $item->title !!}</a>
                        <br>
                        <small class="muted">{!! $item->created_at !!}</small>
                        <hr>


                @endforeach
            </div>
        </div>
    </div>
    <!--/.categories-->

     <div class="widget categories">
            <h3>Twitter</h3>

            <div class="row">
                <div class="col-sm-6">

                </div>
            </div>
        </div>
        <!--/.categories-->
</aside>