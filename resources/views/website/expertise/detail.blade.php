@extends('layouts.master')

@section('meta_title', $expertise->meta_title)
@section('meta_description', $expertise->meta_description)

@section('content')
@if ($expertise && $expertise->schema)
    @include('website.common.scheme', ['schema' => $expertise->schema])
@endif
        <!-- CONDITION HEADER -->
        <section class="content__banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 align-self-center">
                        <div class="content_box_wrapper">
                            <h1>{{ $expertise->title }}</h1>
                            <p>{!! $expertise->short_description !!}</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="content__banner-img">
                            <img src="{{ $expertise->detail_icon ? asset($expertise->detail_icon) : asset('front/assets/img/f1.svg') }}" alt="{{ $expertise->title }}">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if ($expertise->quickFacts->count() > 0)
        <section class="bg-cream py-5">
            <div class="container">
                <div class="col-lg-12">
                    <div class="section-title no-after pt-0 ps-0 mb-0">
                        <h2 class="text-primary">Quick Facts</h2>
                    </div>
                </div>
                <div class="row pt-5">
                    @foreach ($expertise->quickFacts as $quickfact)
                    <div class="col-lg-4 mb-3 mb-lg-0">
                        <div class="row">
                            <div class="col-3">
                                <img src="{{ asset('front/assets/img/Heart-purple_1.svg') }}" width="513" height="422" alt="Speed-icon" class="img-fluid" loading="lazy">
                            </div>
                            <div class="col-9">
                                <h4 class="mb-2">{{ $quickfact->title }}</h4>
                                <p class="text-primary">
                                    {{ $quickfact->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
        @include('website.common.render-content-sections', ['contentTabs' => $expertise->contentTabs, 'contentSections' => $expertise->contentSections])

@include('website.common.appointment-cta')
@include('website.common.partner')
@include('website.common.newsletter')
@endsection