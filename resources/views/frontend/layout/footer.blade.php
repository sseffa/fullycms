<style>
.tagcloud a, #footer.litex .tagcloud a {
    background: none repeat scroll 0 0 #fefefe;
    border: 2px solid #e1e1e1;
    border-radius: 3px;
    color: #898989;
    display: inline-block;
    font-size: 11px;
    font-weight: bold;
    line-height: 16px;
    margin: 0 5px 5px 0;
    min-width: 18px;
    padding: 4px 10px;
    text-decoration: none;
    text-transform: uppercase;
    width: auto;
}
.tagcloud a:hover, #footer.litex .tagcloud a:hover {
    border-color: #ffcc00;
    color: #333;
}
.tagcloud a {
    background: none repeat scroll 0 0 #363636;
    border: medium none;
    color: #808080;
    display: inline-block;
    margin: 3px;
    padding: 7px 14px;
}
.tagcloud a:hover {
    background: none repeat scroll 0 0 #e84a52;
    color: #fff !important;
}
.litex .footer-in .tagcloud a {
    color: #898989;
}
.litex .footer-in .tagcloud a:hover {
    background: none repeat scroll 0 0 #fff;
    color: #333;
}
</style>
<section id="bottom" class="wet-asphalt">
    <div class="container">
        <div class="row">

            <div class="col-md-3 col-sm-6">
                <h4>Latest Blog</h4>

                <div>
                    @foreach($articles as $article)
                    <div class="media">
                        <div class="pull-left">
                            @if($article->path && $article->file_name)
                                <a href="{!! URL::route('dashboard.article.show', array('slug'=>$article->slug)) !!}"><img src="{!! url($article->path . 'thumb_' . $article->file_name) !!}" style="border: 2px solid;" alt=""></a>
                            @else
                                <a href="{!! URL::route('dashboard.article.show', array('slug'=>$article->slug)) !!}"><img src="{!! url('assets/images/blog_s.png') !!}" alt="" style="border: 2px solid;"></a>
                            @endif
                        </div>
                        <div class="media-body">
                            <span class="media-heading"><a href="{!! URL::route('dashboard.article.show', array('slug'=>$article->slug)) !!}">{!! $article->title !!}</a></span>
                            <small class="muted">{!! $article->created_at !!}</small>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

             <div class="col-md-3 col-sm-6">
                <h4>About Us</h4>

                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p>

                <p>Pellentesque habitant morbi tristique senectus.</p>
                <hr>
                <ul class="social clearfix">
                    <li><a href="#" title="" data-original-title="Facebook" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" title="" data-original-title="Google Plus" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#" title="" data-original-title="Twitter" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" title="" data-original-title="Youtube" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#" title="" data-original-title="Linkedin" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#" title="" data-original-title="Dribbble" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#" title="" data-original-title="Skype" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-skype"></i></a></li>
                </ul>
            </div>


            <div class="col-md-3 col-sm-6">
                <h4>Tags</h4>
            <div class="tagcloud">
                @if(isset($tags))
                    @foreach($tags as $tag)
                        <a href="{!! URL::route('dashboard.tag', array('tag'=>$tag->slug)) !!}">{!! $tag->name !!}</a>
                    @endforeach
                @endif
            </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <h4>Address</h4>
                <address>
                    <strong>Twitter, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    <abbr title="Phone">P:</abbr> (123) 456-7890
                </address>
                <h4>{!!  trans('fully.newsletter') !!}</h4>

                {!! Form::open(array('route' => 'frontend.maillist.post', 'id'=>'newsletterForm', 'novalidate'=>'novalidate')) !!}
                <div class="input-group">
                    <input type="text" class="form-control" autocomplete="off" placeholder="{!!  trans('fully.enter_your_email') !!}">
                    <span class="input-group-btn">
                        <button class="btn btn-danger" type="submit">{!!  trans('fully.button_save') !!}</button>
                    </span>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <ul class="language_bar_chooser">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a rel="alternate" hreflang="{!!$localeCode!!}" href="{!! LaravelLocalization::getLocalizedURL($localeCode) !!}">
                            {!! $properties['native'] !!}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-4">
                &copy; 2015 <a target="_blank" href="http://www.sefakaragoz.com">Sefa Karagöz</a> {!! trans('fully.all_rights_reserved') !!}.
                <br>
                <br>
                <a target="_blank" href="https://www.digitalocean.com/?refcode=33a90ba86b5a">DigitalOcean</a>
            </div>
            <div class="col-sm-4">
                <ul class="pull-right">
                    <li>{!! link_to_route('dashboard', 'Home') !!}</li>
                    <li>{!! link_to_route('dashboard.faq', 'Faq') !!}</li>
                    <li>{!! link_to_route('dashboard.contact', 'Contact Us') !!}</li>
                    <li><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a></li>
                    <!--#gototop-->
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--/#footer-->
