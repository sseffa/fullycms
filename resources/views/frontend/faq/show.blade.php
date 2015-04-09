@extends('frontend/layout/layout')
@section('content')
{!! HTML::style('ckeditor/contents.css') !!}

<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Faqs</h1>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Faq</li>
                </ol>
            </div>
        </div>
    </div>
</section><!--/#title-->


<section id="faqs" class="container">
    <ul class="faq unstyled">
        @foreach($faqs as $faq)
        <li>
            <span class="number">{!! $faq->id !!}</span>
            <div>
                <h4>{!! $faq->question !!}</h4>
                <p>{!! $faq->answer !!}</p>
            </div>
        </li>
        @endforeach
    </ul>
</section><!--#faqs-->
@stop


