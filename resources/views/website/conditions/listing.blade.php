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
                    <p class="after-circle text-white text-thin after-circle mx-auto">Speciality</p>
                    <h2 class="text-center text-secondary">Conditions</h2>
                    <p class="text-center text-white">Comprehensive care for a wide range of spinal conditions, from back pain and sciatica to complex injuries and disc herniations. Mr.Hasnat Properties offers personalized treatments to restore your health and mobility.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="shape-bg">
        <img class="shape" src="{{ asset('front/assets/img/banners/hero-bg.webp') }}">
    </div>
</section>

<!-- Conditions -->
<section class="speciality-area overflow-x py-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach ($conditions as $condition)
                        @include('website.conditions.card', compact('condition'))
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Technologies and Methods -->
@include('website.common.tech-methods')

@include('website.common.partner')
@include('website.common.newsletter')
@endsection