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
                    <p class="after-circle text-white text-thin after-circle mx-auto">Research and Insights</p>
                    <h2 class="text-center text-secondary">Publications</h2>
                    <p class="text-center text-white">Explore a collection of our research and scholarly articles. Each publication reflects our commitment to advancing knowledge and contributing to the field.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="shape-bg">
        <img class="shape" src="{{ asset('front/assets/img/banners/hero-bg.webp') }}">
    </div>
</section>

<!-- Publications -->
@livewire('publications-listing-component')
@endsection