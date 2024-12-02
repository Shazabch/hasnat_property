@extends('layouts.master')

@section('meta_title', $pageData->meta_title ?? "")
@section('meta_description', $pageData->meta_description ?? "")

@section('content')
@if ($pageData && $pageData->schema)
    @include('website.common.scheme', ['schema' => $pageData->schema])
@endif
<section class="inner-banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title no-after pt-0 ps-0">
                    <p class="after-circle text-white text-thin after-circle mx-auto">Feel Free To Contact Us</p>
                    <h2 class="text-center text-secondary">Contact Us</h2>
                    <div class="page-title-item mt-0 mx-auto">
                        <ul class="text-center">
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li>
                                <i class="icofont-simple-right"></i>
                            </li>
                            <li>Contact Us</li>
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

<div class="location-area">
    <div class="container-fluid">
        <div class="row location-wrap mt-0 box-shadow-n">
            <div class="col-sm-6 col-lg-4">
                <div class="location-item text-center text-md-start">
                    <i class="icofont-location-pin"></i>
                    <h3>Location</h3>
                    <p><a target="_blank" href="https://maps.app.goo.gl/MpQDCuD1KVC5LLUZ6">{{ $address_line_1 }} {{ $address_line_2 }}<br> {{ $address_line_3 }}</a></p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="location-item text-center text-md-start">
                    <i class="icofont-ui-message"></i>
                    <h3>Email</h3>
                    <ul>
                        <li>
                            <a href="mailto:{{ $email1 }}">{{ $email1 }}</a>
                        </li>
                        @if ($email2 != '') 
                            <li>
                                <a href="mailto:{{ $email2 }}">{{ $email2 }}</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-sm-6   col-lg-4">
                <div class="location-item text-center text-md-start">
                    <i class="icofont-ui-call"></i>
                    <h3>Phone</h3>
                    <ul>
                        <li>
                            <a href="tel:{{ $phone1['value'] }}">{{ $phone1['label'] }}</a>
                        </li>
                        @if ($phone2['value'] != '' && $phone2['label'] != '')
                            <li>
                                <a href="tel:{{ $phone2['value'] }}">{{ $phone2['label'] }}</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Drop -->
<section class="drop-area pt-4 pt-md-0">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-7 p-0">
                <div class="drop-item drop-img">
                    <div class="drop-left">
                        <h2>Drop your message for any info or question.</h2>
                        @livewire('contact-form-component')
                    </div>
                </div>
            </div>
            <div class="col-lg-5 p-0">
                <div class="speciality-item speciality-right speciality-right-two speciality-right-three">
                    <img src="{{ asset('front/assets/img/5124556.jpg') }}" class="flip-img" alt="Contact">
                    <div class="speciality-emergency">
                        <div class="speciality-icon">
                            <i class="icofont-ui-call"></i>
                        </div>
                        <h3>Emergency Call</h3>
                        <p class="text-secondary mt-2">{{ $phone1['label'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Drop -->

<!-- Map -->
<iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.546968554876!2d-0.1504520238715974!3d51.521526909671806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761ad13892fa3f%3A0xb96ceb5c81550ce4!2s110%20Harley%20St%2C%20London%20W1G%207JG%2C%20UK!5e0!3m2!1sen!2s!4v1728756300577!5m2!1sen!2s" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
<!-- End Map -->
@endsection