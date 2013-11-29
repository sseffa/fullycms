@extends('frontend/_layout/layout')
@section('content')
{{ HTML::style('assets/bootstrap/css/modern-business.css') }}
{{ HTML::style('assets/bootstrap/css/font-awesome.min.css') }}
<div id="myCarousel" class="carousel slide">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
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
                <h1></h1>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</div>

<div class="section">

    <div class="container">

        <div class="row">
            <div class="col-lg-4 col-md-4">
                <h3><i class="icon-ok-circle"></i> Bootstrap 3 Built</h3>

                <p>The 'Modern Business' website template by
                    <a href="#">Start Bootstrap</a> is built with
                    <a href="http://getbootstrap.com">Bootstrap 3</a>. Make sure you're up to date with latest Bootstrap documentation!
                </p>
            </div>
            <div class="col-lg-4 col-md-4">
                <h3><i class="icon-pencil"></i> Ready to Style &amp; Edit</h3>

                <p>You're ready to go with this pre-built page structure, now all you need to do is add your own custom stylings! You can see some free themes over at
                    <a href="http://bootswatch.com">Bootswatch</a>, or come up with your own using
                    <a href="http://getbootstrap.com/customize/">the Bootstrap customizer</a>!</p>
            </div>
            <div class="col-lg-4 col-md-4">
                <h3><i class="icon-folder-open-alt"></i> Many Page Options</h3>

                <p>This template features many common pages that you might see on a business website. Pages include: about, contact, portfolio variations, blog, pricing, FAQ, 404, services, and general multi-purpose pages.</p>
            </div>
        </div>

    </div>
</div>

<div class="section-colored text-center">

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h2>Modern Business: A Clean &amp; Simple Full Website Template by Start Bootstrap</h2>

                <p>A complete website design featuring various single page templates from Start Bootstraps library of free HTML starter templates.</p>
                <hr>
            </div>
        </div>
    </div>

</div>

<div class="section">

    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Display Some Work on the Home Page Portfolio</h2>
                <hr>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <a href="portfolio-item.html"><img class="img-responsive img-home-portfolio" src="http://placehold.it/700x450"></a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <a href="portfolio-item.html"><img class="img-responsive img-home-portfolio" src="http://placehold.it/700x450"></a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <a href="portfolio-item.html"><img class="img-responsive img-home-portfolio" src="http://placehold.it/700x450"></a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <a href="portfolio-item.html"><img class="img-responsive img-home-portfolio" src="http://placehold.it/700x450"></a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <a href="portfolio-item.html"><img class="img-responsive img-home-portfolio" src="http://placehold.it/700x450"></a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <a href="portfolio-item.html"><img class="img-responsive img-home-portfolio" src="http://placehold.it/700x450"></a>
            </div>
        </div>

    </div>

</div>

<div class="section-colored">

    <div class="container">

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h2>Modern Business Features Include:</h2>
                <ul>
                    <li>Bootstrap 3 Framework</li>
                    <li>Mobile Responsive Design</li>
                    <li>Predefined File Paths</li>
                    <li>Working PHP Contact Page</li>
                    <li>Minimal Custom CSS Styles</li>
                    <li>Unstyled: Add Your Own Style and Content!</li>
                    <li>Font-Awesome fonts come pre-installed!</li>
                    <li>100% <strong>Free</strong> to Use</li>
                    <li>Open Source: Use for any project, private or commercial!</li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <img class="img-responsive" src="http://placehold.it/700x450/ffffff/cccccc">
            </div>
        </div>
    </div>
</div>

<div class="section">

    <div class="container">

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <img class="img-responsive" src="http://placehold.it/700x450">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h2>Modern Business Features Include:</h2>
                <ul>
                    <li>Bootstrap 3 Framework</li>
                    <li>Mobile Responsive Design</li>
                    <li>Predefined File Paths</li>
                    <li>Working PHP Contact Page</li>
                    <li>Minimal Custom CSS Styles</li>
                    <li>Unstyled: Add Your Own Style and Content!</li>
                    <li>Font-Awesome fonts come pre-installed!</li>
                    <li>100% <strong>Free</strong> to Use</li>
                    <li>Open Source: Use for any project, private or commercial!</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@stop