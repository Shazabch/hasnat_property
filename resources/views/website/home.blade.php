@extends('layouts.master')

@section('meta_title', $pageData->meta_title ?? "")
@section('meta_description', $pageData->meta_description ?? "")

@section('content')
@if ($pageData && $pageData->schema)
    @include('website.common.scheme', ['schema' => $pageData->schema])
@endif
    <!-- BANNER NEW -->
    <section class="home-banner p-0">
        <div id="themeSlider" class="carousel slide pointer-event" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('storage/' . $homeSections->image1) }}" class="banner_img" alt="">
                    <div class="caption-head">
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="content_box_wrapper text-center">
                                            <h1>{{ $homeSections->title1 }} <span class="text-secondary">{{$homeSections->sec_title1  }}</span></h1>
                                            <p>{{ $homeSections->content1 }}</p>
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
    <!-- About -->
    <section class="sec_about position-relative overflow-x">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 pe-sm-5" data-aos="fade-down" data-aos-duration="2000" data-aos-delay="300">
                    <div class="left">
                        <div class="anim-reveal-line mb-4 mb-md-0">
                            <h2 class="title text-secondary mb-2">
                                <span class="text-white">{{ $homeSections->main_title2 }}</span> <br>
                               {{ $homeSections->sub_title2 }}
                            </h2>
                            <h4 class="mb-3">{{ $homeSections->third_title2 }}</h4>
                            <p class="text-white">
                               {{ $homeSections->content2 }}
                            </p>
                            <a href="" class="button smaller button_secondary mb-0">LEARN MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="300">
                    <div class="img-wrap">
                        <img src="{{ asset('storage/' . $homeSections->image2) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-team bg-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title no-after pt-0 ps-0 text-center">
                        <p class="after-circle text-thin after-circle mx-auto text-white">Expert and Comprehensive</p>
                        <h2 class="text-center text-secondary">Our Expert Team</h2>
                        <p class="text-white">
                            We listed our oppertunity and servies as a real estate company
                        </p>
                    </div>
                </div>
            <div class="row">
                @foreach($teamData as $team)
                <div class="col-lg-4 col-md-6">
                    <div class="agent-card card ">
                        <div class="agent-img">
                            @if($team->image)
                        <img src="{{ asset('/' . $team->image) }}" alt="{{ $team->name }}" class="img-fluid">
                    @else
                    <img src="default-image.jpg" alt="No Image" class="img-fluid">
                    @endif
                        </div>
                        <div class="agent-content">
                            <h6>
                              <b class="text-warning">Name :</b> {{$team->name }}
                            </h6>
                            <p class="mb-0"><i class="bx bx-user-voice"></i><b>Designation :</b>  {{ $team->designation }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="section-properties bg-dark2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title no-after pt-0 ps-0 text-center">
                        <p class="after-circle text-thin after-circle mx-auto text-white">Expert and Comprehensive</p>
                        <h2 class="text-center text-secondary">Properties</h2>
                        <p class="text-white">
                            Discover exceptional property solutions in Bahria Town Lahore with Hasnat Properties. Whether you’re buying, selling, or renting, our dedicated team ensures a smooth and customer-focused experience. Let us help you find the perfect property with ease.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @each('common.property-card',$properties , 'property')
            </div>

            <div class="row">
                <div class="col-lg-12 my-4 text-center">
                    <a href="{{ route('properties') }}" class="button smaller button_secondary mb-0">View All</a>
                </div>
            </div>
        </div>
    </section>

    {{-- Counter --}}
    <section class="counter-area counter-area-three counter-bg bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="counter-item">
                        <h3>
                            <span class="odometer" data-count="{{$homeSections->properties_sold}}">00</span>
                            <span class="target">+</span>
                        </h3>
                        <p>Properties Sold</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="counter-item">
                        <h3>
                            <span class="odometer" data-count="{{$homeSections->happy_clients}}">00</span>
                            <span class="target">+</span>
                        </h3>
                        <p>Happy Clients</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="counter-item">
                        <h3>
                            <span class="odometer" data-count="{{$homeSections->years_exp}}">00</span>
                            <span class="target">+</span>
                        </h3>
                        <p>Years of Experience</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="counter-item">
                        <h3>
                            <span class="odometer" data-count="{{$homeSections->rented_properties}}">00</span>
                            <span class="target">+</span>
                        </h3>
                        <p>Properties Rent</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="testimonials after-images bg-dark2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title no-after pt-0 ps-0 text-center">
                        <p class="after-circle text-thin after-circle mx-auto text-white">Client Success Stories</p>
                        <h2 class="text-center text-white">Our <span>Happy Clients </span> Are <br> Sharing Something Awesome</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-lg-12">
                <div id="customers-testimonials" class="owl-carousel">
                    @foreach ($testimonials as $testimonial)
                        <div class="item">
                            @include('website.testimonials.card', ['testimonial' => $testimonial])
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-12 my-4 text-center">
                    <a href="{{ route('reviews') }}" class="button smaller button_secondary mb-0">View All</a>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="section-team bg-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title no-after pt-0 ps-0 text-center">
                        <p class="after-circle text-thin after-circle mx-auto text-white">Societies we have work with</p>
                        <h2 class="text-center text-secondary">Our Associations</h2>
                        {{-- <p class="text-white"></p> --}}
                    </div>
                </div>
            </div>

            <div class="marquee-carousel-container">
                <div class="marquee-carousel d-flex">
                    @foreach ($expertise as $item)
                    <div class="expert-card card  text-center ">
                        <div class="expert-img">
                            <img src="{{ asset($item['url']) }}" alt="{{ $item['title'] }}" class="img-fluid ">
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
    </section>

    <!-- publications -->
    <section class="blog-area bg-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title no-after pt-0 ps-0">
                        <p class="after-circle text-thin after-circle mx-auto text-white">Research and Market Insights</p>
                        <h2 class="text-center text-secondary">Blogs</h2>
                        <p class="text-white text-center">
                            Hasnat Properties is your go-to source for insightful real estate blogs. We regularly publish updates on the latest market trends, investment opportunities, and expert advice for buying, selling, and renting properties in Bahria Town Lahore. Stay informed and make smart property decisions with our expert insights.
                        </p>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="blogs-slider owl-carousel owl-theme">
                    @foreach ($publications as $publication)
                    <div class="item" data-aos="fade-down" data-aos-duration="2000" data-aos-delay="100">
                        @include('website.publications.card', ['publication' => $publication])
                    </div>
                    @endforeach  
                </div>
            </div>
            <div class="col-lg-12 mt-4 text-center">
                <a href="{{ route('publications') }}" class="button smaller button_secondary mb-0 mouse_go">View All</a>
            </div>
        </div>
    </section>
    @include('website.common.newsletter')
    <style>
        .marquee-carousel-container {
            overflow: hidden;
            white-space: nowrap;
            position: relative;
            width: 100%;
            height: 150px;
        }
        .marquee-carousel {
            display: flex;
            gap: 15px;
            /* animation: marquee 30s linear infinite; */
        }
        @keyframes marquee {
            from { transform: translateX(100%); }
            to { transform: translateX(-100%); }
        }
        .expert-card {
            flex: 0 0 auto;
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .expert-img img {
            width: 100%;
            height: 100px;
            object-fit: cover; /* Ensures all images maintain aspect ratio and fill container */
            border-radius: 10px;
        }
    </style>
@endsection
