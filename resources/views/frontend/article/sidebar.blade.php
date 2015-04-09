<aside class="col-sm-4 col-sm-push-8">
@include('frontend/elements/search')
    <div class="widget categories">
        <h3>Blog Categories</h3>

        <div class="row">
            <div class="col-sm-6">
                <ul class="arrow">
                    @foreach($categories->slice(0, round($categories->count()/2)) as $category)
                    <li>
                        <a href="{!! URL::route('dashboard.category', array('category'=>$category->slug)) !!}">{!! $category->title !!}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-6">
                <ul class="arrow">
                    @foreach($categories->slice(round($categories->count()/2), ($categories->count())) as $category)
                    <li>
                        <a href="{!! URL::route('dashboard.category', array('category'=>$category->slug)) !!}">{!! $category->title !!}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!--/.categories-->
    <div class="widget tags">
        <h3>Tag Cloud</h3>
        <ul class="tag-cloud">
            @foreach($tags as $tag)
            <li>
                <a class="btn btn-xs btn-primary" href="{!! URL::route('dashboard.tag', array('tag'=>$tag->slug)) !!}">{!! $tag->name !!}</a>
            </li>
            @endforeach
        </ul>
    </div>
    <!--/.tags-->
</aside>