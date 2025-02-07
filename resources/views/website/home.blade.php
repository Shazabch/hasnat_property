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
    <!-- Expertise -->
    {{-- <section class="speciality-area overflow-x py-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="speciality-left py-5 px-0">
                        <div class="section-title no-after pt-0 ps-0 mb-0 text-center">
                            <p class="after-circle text-thin after-circle mx-auto text-primary">Speciality</p>
                            <h2>Expertise</h2>
                            <p class="mt-2 mb-4">Renowned for his exceptional skill, Mr.Hasnat Properties is a leading consultant spinal neurosurgeon with 30+ years of experience. His expertise spans Endoscopic, Robotic Spine and Sports Injuries procedures for various spinal conditions, including degenerative, traumatic, and malignant disorders.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="speciality-item">
                        <div class="row">
                            @foreach ($dashboard_expertises as $expertise)
                                @include('website.expertise.dashboard_card', ['expertise' => $expertise])
                            @endforeach
                        </div>
                        <div class="row" data-aos="fade-down" data-aos-duration="2000" data-aos-delay="300">
                            <div class="col-lg-12 mt-4 text-center">
                                <a href="{{ route('expertise') }}" class="button smaller mouse_go">View All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section class="qualifications py-70">
        <div class="container qualification-section">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title no-after pt-0 ps-0 text-center">
                        <p class="after-circle text-thin after-circle mx-auto text-white">Expert and Comprehensive</p>
                        <h2 class="text-center text-secondary">Services</h2>
                        <p class="text-white">
                            For top real estate services in Bahria Town Lahore, trust Hasnat Properties. We specialize in buying, selling, and renting properties with unmatched expertise. Our team is dedicated to providing seamless, reliable, and customer-focused solutions to meet all your real estate needs.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="th-card-1 shadow" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="100">
                        <div class="th-card-1-img">
                            <img src="{{ asset('front/assets/img/hospital.png') }}" class="obj_fit" alt="">
                        </div>
                        <div class="th-card-1-content">
                            <h2>Property Buying</h2>
                            <p class="disc">
                                Find your dream home or investment property with our expert guidance in Bahria Town Lahore.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="th-card-1 shadow" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="200">
                        <div class="th-card-1-img">
                            <img src="{{ asset('front/assets/img/hospital.png') }}" class="obj_fit" alt="">
                        </div>
                        <div class="th-card-1-content">
                            <h2>Property Selling</h2>
                            <p class="disc">
                                Get the best value for your property with our hassle-free and professional selling services.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="th-card-1 shadow" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="300">
                        <div class="th-card-1-img">
                            <img src="{{ asset('front/assets/img/hospital.png') }}" class="obj_fit" alt="">
                        </div>
                        <div class="th-card-1-content">
                            <h2>Property Renting</h2>
                            <p class="disc">
                                Explore a wide range of rental options tailored to your preferences and budget.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="th-card-1 shadow" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="th-card-1-img">
                            <img src="{{ asset('front/assets/img/hospital.png') }}" class="obj_fit" alt="">
                        </div>
                        <div class="th-card-1-content">
                            <h2>Real Estate Consultancy</h2>
                            <p class="disc">
                                Receive expert advice and market insights to make informed real estate decisions.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="th-card-1 shadow" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="500">
                        <div class="th-card-1-img">
                            <img src="{{ asset('front/assets/img/hospital.png') }}" class="obj_fit" alt="">
                        </div>
                        <div class="th-card-1-content">
                            <h2>Property Management</h2>
                            <p class="disc">
                                Trust us to handle your property maintenance and tenant management efficiently.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="th-card-1 shadow" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                        <div class="th-card-1-img">
                            <img src="{{ asset('front/assets/img/hospital.png') }}" class="obj_fit" alt="">
                        </div>
                        <div class="th-card-1-content">
                            <h2>Investment Opportunities</h2>
                            <p class="disc">
                                Discover lucrative real estate investments with guaranteed returns and growth potential.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

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
                            <span class="odometer" data-count="8000">00</span>
                            <span class="target">+</span>
                        </h3>
                        <p>Properties Sold</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="counter-item">
                        <h3>
                            <span class="odometer" data-count="10000">00</span>
                            <span class="target">+</span>
                        </h3>
                        <p>Happy Clients</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="counter-item">
                        <h3>
                            <span class="odometer" data-count="30">00</span>
                            <span class="target">+</span>
                        </h3>
                        <p>Years of Experience</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="counter-item">
                        <h3>
                            <span class="odometer" data-count="30">00</span>
                            <span class="target">+</span>
                        </h3>
                        <p>Properties Rent</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials after-images bg-dark2">
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
    </section>


    <!-- Publications -->
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
                    {{-- @foreach ($publications as $publication)
                    <div class="item" data-aos="fade-down" data-aos-duration="2000" data-aos-delay="100">
                        @include('website.publications.card', ['publication' => $publication])
                    </div>
                    @endforeach   --}}
                </div>
            </div>
            <div class="col-lg-12 mt-4 text-center">
                <a href="{{ route('publications') }}" class="button smaller button_secondary mb-0 mouse_go">View All</a>
            </div>
        </div>
    </section>
    @include('website.common.newsletter')
@endsection
