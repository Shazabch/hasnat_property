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
                            <label for="">Type</label>
                            <select class="js-select2 form-control" name="type" data-placeholder="All Type">
                                <option value=""></option>
                                <option value="rent">To Rent</option>
                                <option value="sale">For Sale</option>
                            </select>
                        </div>
                        <div class="search-dropdown col-lg-3">
                            <label for="property_type">Property Type</label>
                            <select class="js-select2 form-control" name="property_type" id="property_type" data-placeholder="All Property Type">
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
            @each('common.property-card',$properties , 'property')
        </div>
    </div>
</section>
@endsection
