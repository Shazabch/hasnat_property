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
                    <p class="after-circle text-white text-thin after-circle mx-auto">What Our Patients Say</p>
                    <h2 class="text-center text-secondary">Reviews</h2>
                    <div class="page-title-item mt-0 mx-auto">
                        <ul class="text-center">
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li>
                                <i class="icofont-simple-right"></i>
                            </li>
                            <li>Reviews</li>
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
<section class="reviews-listing">
    <div class="container my-5" style="margin-bottom: 130px !important;">
        <div class="row">
            <div class="col-lg-4">
                @foreach ($testimonials_part_1 as $testimonial)
                <div class="mb_70">
                    @include('website.testimonials.card', ['testimonial' => $testimonial])
                </div>
                @endforeach
            </div>
    
            <div class="col-lg-4">
                @foreach ($testimonials_part_2 as $testimonial)
                <div class="mb_70">
                    @include('website.testimonials.card', ['testimonial' => $testimonial])
                </div>
                @endforeach
            </div>
    
            <div class="col-lg-4">
                @foreach ($testimonials_part_3 as $testimonial)
                <div class="mb_70">
                    @include('website.testimonials.card', ['testimonial' => $testimonial])
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection