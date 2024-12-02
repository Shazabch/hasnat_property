@extends('layouts.master')

@section('meta_title', $condition->meta_title)
@section('meta_description', $condition->meta_description)

@section('content')
@if ($condition && $condition->schema)
    @include('website.common.scheme', ['schema' => $condition->schema])
@endif
        <!-- CONDITION HEADER -->
        <section class="content__banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 align-self-center">
                        <div class="content_box_wrapper">
                            <h1>{{ $condition->title }}</h1>
                            <p>{{ $condition->short_description }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="content__banner-img">
                            <img src="{{ $condition->detail_icon ? asset($condition->detail_icon) : asset('front/assets/img/f1.svg') }}" alt="{{ $condition->title }}">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('website.common.render-content-sections', ['contentTabs' => $condition->contentTabs, 'contentSections' => $condition->contentSections])

        
        <section class="speciality-area overflow-x py-2 spy-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            @foreach ($related_expertises as $related_expertise)    
                            @include('website.expertise.card', ['expertise' => $related_expertise])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
@include('website.common.appointment-cta')
@include('website.common.partner')
@include('website.common.newsletter')
@endsection