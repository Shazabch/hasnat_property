@extends('layouts.master')

@section('meta_title', "Properties")
@section('meta_description', "Properties")

@section('content')
<section class="inner-banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title no-after pt-0 ps-0">
                    <p class="after-circle text-white text-thin after-circle mx-auto">About Hasnat Property Newtwork</p>
                    <h2 class="text-center text-secondary">Our Property Listing</h2>
                    <div class="page-title-item mt-0 mx-auto">
                        <ul class="text-center">
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li>
                                <i class="icofont-simple-right"></i>
                            </li>
                            <li>Property Listing</li>
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
<section class="section-properties bg-dark2">
    <div class="container">
        <div class="row">
            <div class="section-search-widget py-5">
                <div class="search-widget-wrap">
                   <form action="#">
                    <div class="search-widget-inner row">
                        <div class="search-input col-lg-3">
                            <label for="keyword">Keyword</label>
                            <input
                            type="text"
                            class="form-control "
                            name="keyword"
                            id="keyword"
                            placeholder="Search here."
                            value="{{ request('keyword') }}"
                        >
                        </div>
                        <div class="search-dropdown col-lg-3">
                            <label for="">Status</label>
                            <select class="js-select2 form-control" data-placeholder="All Status">
                                <option value=""></option>
                                <option value="For Rent">For Rent</option>
                                <option value="For Sale">For Sale</option>
                            </select>
                        </div>
                        <div class="search-dropdown col-lg-3">
                            <label for="property_type">Type</label>
                            <select class="js-select2 form-control" name="property_type" id="property_type" data-placeholder="All Type">
                                <option value="" selected>All Type</option>
                                @foreach ($propertyTypes as $type)
                                    <option value="{{ strtolower($type) }}">{{ ucfirst($type) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="search-btn col-lg-3">
                            <button type="submit" class="th-btn md w-100">
                                Search
                            </button>
                        </div>
                    </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="row">
                @foreach ( $properties as $property )
                <div class="col-lg-4">
                    <div class="product-custom">
                        <div class="profile-widget">
                            <div class="doc-img">
                                @if ($property->main_image)
                                <a href="{{route('properties-detail', $property->id)}}" class="property-img mouse_go">
                                    <img src="{{ asset($property->main_image) }}" alt="Property Image"
                                            style=" height: 320px; width: 480px">
                                </a>
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif

                                <div class="product-amount">
                                    <span><b>PKR</b>: {{ $property->price }}</span>
                                </div>
                                <div class="feature-rating">
                                    <div>
                                        <div class="featured">
                                            @if ($property->featured)
                                            <span>Featured</span>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-content">
                                <h3 class="title">
                                    <a href="{{route('properties-detail', $property->id)}}" tabindex="-1" class="mouse_go">{{ $property->title }}</a>
                                </h3>
                                <p><i class="feather-map-pin"></i> {{ $property->adress }}</p>
                                <ul class="property-category d-flex justify-content-between mb-0">
                                    <li>
                                        <span class="list">Listed on : </span>
                                        <span class="date">{{ $property->created_at->format('d-M-Y h:i a') }}</span>
                                    </li>
                                    <li>
                                        <span class="category list">Category : </span>
                                        <span class="category-value date">{{ $property->categories }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>


        </div>
    </div>
</section>
@endsection
