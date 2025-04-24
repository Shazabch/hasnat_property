@extends('layouts.master')

@section('meta_title', $publication->meta_title)
@section('meta_description', $publication->meta_description)

@section('content')
@if ($publication && $publication->schema)
    @include('website.common.scheme', ['schema' => $publication->schema])
@endif
 <!-- Publication-Header -->
 <section class="home_banner p-0">
    <div id="themeSlider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ $publication->image ? asset($publication->image) : asset('front/assets/img/blog_detail_placeholder.webp') }}" class="home-banner-bg" alt="{{ $publication->image_alt }}">
                <div class="caption-head">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 align-self-center">
                                    <div class="content_box_wrapper">
                                        <h1>{{ $publication->title }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-detail-content bg-cream">
    <div class="container1650">
        <div class="row">
            <div class="col-lg-12 d-lg-block d-none">
                {!! $publication->content  !!}
            
            </div>
        </div>
    </div>
</section>


{{-- FAQS --}}
{{-- @include('website.common.faqs') --}}
<!-- Publications -->
{{-- <section class="blog-area py-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title no-after pt-0 ps-0">
                    <p class="after-circle text-thin after-circle mx-auto text-primary">Research and Insights</p>
                    <h2 class="text-center">Latest Publications</h2>
                    <p class="text-primary text-center">Explore a collection of our research and scholarly articles. Each publication reflects our commitment to advancing knowledge and contributing to the field.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="blogs-slider owl-carousel owl-theme">
                @foreach ($related_publications as $related_publication)
                <div class="item" data-aos="fade-down" data-aos-duration="2000" data-aos-delay="100">
                    @include('website.publications.card',['publication' => $related_publication])
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-12 mt-4 text-center">
            <a href="{{ route('publications') }}" class="button smaller mouse_go">View All</a>
        </div>
    </div>
</section> --}}
@endsection
