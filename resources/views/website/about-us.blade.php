@extends('layouts.master')

@section('meta_title', $pageData->meta_title ?? '')
@section('meta_description', $pageData->meta_description ?? '')

@section('content')
    @if ($pageData && $pageData->schema)
        @include('website.common.scheme', ['schema' => $pageData->schema])
    @endif
    <section class="inner-banner">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title no-after pt-0 ps-0">
                        <p class="after-circle text-white text-thin after-circle mx-auto">About Hasnat Properties</p>
                        <h2 class="text-center text-secondary">About Hasnat Properties</h2>
                        <div class="page-title-item mt-0 mx-auto">
                            <ul class="text-center">
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li>
                                    <i class="icofont-simple-right"></i>
                                </li>
                                <li>About Hasnat Properties</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-bg">
            <img class="shape" src="{{ asset('front/assets/img/banners/hero-bg.webp') }}">
        </div>
    </section>
    <section class="doctor-about">
        <div class="container">
            <div class="wrapper">
                <div class="thumb">
                    <span class="rect"></span>
                    <div class="position-relative img_anim_reveal">
                        <img src="{{ asset('assets/media/home/about.webp') }}" alt="doctor thumb" width="516"
                            height="720">
                    </div>
                </div>
                <div class="content">
                    <h2 class="title"><span class="text-warning">Hasnat</span> Properties </h2>
                    <h3 class="dis1 pb-20">Your Trusted Partner in Real Estate Excellence</h3>
                    <p class="text-white">
                        Welcome to Hasnat Properties, your trusted partner in real estate. Based in Bahria Town
                        Lahore, we pride ourselves on delivering exceptional property solutions tailored to your needs.
                        Whether you’re looking to buy, sell, or rent, our experienced team combines local expertise with a
                        customer-first approach to ensure a seamless experience.
                    </p>
                    <div class="dis2 pb-50">
                        <p class="text-white">
                            At Hasnat Properties, we prioritize transparency, professionalism, and client
                            satisfaction. Our mission is to simplify the real estate journey by offering personalized
                            services, market insights, and unparalleled support.
                        </p>
                    </div>
                    <div class="">
                        <a class="btn btn-secondary" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512"
                                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z">
                                </path>
                            </svg>
                            Appointment
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-dark2">
        <div class="container text-white">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title no-after pt-0 ps-0 text-center">
                        <p class="after-circle text-thin after-circle mx-auto text-white">Expert and Comprehensive</p>
                        <h2 class="text-center text-secondary">What We Do</h2>
                        <p class="text-white">
                            Your one-stop solution for property needs in Bahria Town Lahore
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4">
                    <div class="py-5 px-4 text-center rounded what-we-do">
                        <i class="fa-solid fa-hand-holding-dollar text-secondary"></i>
                        <h5 class="text-secondary hover-text-primary py-3 m-0">
                            Property Buying & Selling
                        </h5>
                        <p>
                            We help you buy and sell residential and commercial properties with ease. From consultation to closing, our experts guide you every step of the way.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="py-5 px-4 text-center rounded what-we-do bg-dark">
                        <i class="fa-solid fa-chart-line text-secondary"></i>
                        <h5 class="text-secondary hover-text-primary py-3 m-0">
                            Rental Services
                        </h5>
                        <p>
                            Looking to rent out or find a property for rent? We match tenants and landlords quickly with fair pricing and reliable contracts.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="py-5 px-4 text-center rounded what-we-do">
                        <i class="fa-solid fa-money-bill-wave text-secondary"></i>
                        <h5 class="text-secondary hover-text-primary py-3 m-0">
                            Investment Guidance
                        </h5>
                        <p>
                            Our team provides market trends, ROI analysis, and expert recommendations to help you make smart, secure property investments.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="full-row bg-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title no-after pt-0 ps-0 text-center">
                        <p class="after-circle text-thin after-circle mx-auto text-white">Expert and Comprehensive</p>
                        <h2 class="text-center text-secondary">Why Choose Us</h2>
                        <p class="text-white">
                            Delivering trust, value, and results with every transaction
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="why-card">
                        <h5 class="mb-3 text-secondary">Local Expertise</h5>
                        <p>With deep roots in Bahria Town Lahore, we offer unmatched insights into property trends and opportunities in the area.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="why-card">
                        <h5 class="mb-3 text-secondary">Personalized Service</h5>
                        <p>Every client is different—so are our solutions. We tailor our approach to fit your goals and needs.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="why-card">
                        <h5 class="mb-3 text-secondary">Transparent Processes</h5>
                        <p>We believe in open communication, honest deals, and clear documentation every step of the way.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="why-card">
                        <h5 class="mb-3 text-secondary">Professional Team</h5>
                        <p>Our experienced agents are dedicated, knowledgeable, and committed to delivering the best real estate experience.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="why-card">
                        <h5 class="mb-3 text-secondary">Customer-First Approach</h5>
                        <p>We prioritize your satisfaction and long-term success, not just the transaction.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="why-card">
                        <h5 class="mb-3 text-secondary">End-to-End Support</h5>
                        <p>From the first inquiry to key handover (and beyond), we’re with you at every milestone of your real estate journey.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="overlay-secondary why-us bg">
        <div class="container position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <div class="text-white">
                        <h2 class="text-white double-down-line-left position-relative pb-4 mb-5">
                            <span class="h4 d-block"></span>Your Neighborhood Experts</h2>
                        <p>With years of experience in Bahria Town Lahore, we know the streets, the trends, and the opportunities. Our local insight ensures you get the best value and the right advice every time.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                    <div class="agent-card card flex-fill">
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
    @include('website.common.newsletter')
@endsection
