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
                    <div class="search-widget-inner row">
                        <div class="search-input col-lg-3">
                            <label for="keyword">Keyword</label>
                            <input type="email" class="" id="keyword" placeholder="Enter Keyword...">
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
                            <label for="">Type</label>
                            <select class="js-select2 form-control" data-placeholder="All Type">
                                <option value=""></option>
                                <option value="apartment">Apartment</option>
                                <option value="bar">Bar</option>
                                <option value="cafe">Cafe</option>
                                <option value="farm">Farm</option>
                                <option value="house">House</option>
                                <option value="luxury-homes">Luxury Homes</option>
                                <option value="office">Office</option>
                                <option value="single-family">Single Family</option>
                                <option value="store">Store</option>
                                <option value="villa">Villa</option>
                            </select>
                        </div>
                        <div class="search-btn col-lg-3">
                            <a href="" class="th-btn md w-100">
                                Search
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="product-custom">
                    <div class="profile-widget">
                        <div class="doc-img">
                            <a href="" class="property-img mouse_go">
                                <img class="img-fluid" alt="Property Image" src="{{asset('assets/media/banners/home-1.jpg')}}">
                            </a>
                            <div class="product-amount">
                                <span>$51,000</span>
                            </div>
                            <div class="feature-rating">
                                <div>
                                    <div class="featured">
                                        <span>Featured</span>
                                    </div>
                                </div>
                                <a href="javascript:void(0)">
                                    <div class="favourite  selected">
                                        <span><i class="fa-regular fa-heart"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="pro-content">
                            <div class="rating">
                                <span class="rating-count">
                                    <i class="fa-solid fa-star checked"></i>
                                    <i class="fa-solid fa-star checked"></i>
                                    <i class="fa-solid fa-star checked"></i>
                                    <i class="fa-solid fa-star checked"></i>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <p class="rating-review"><span>4.0</span>(13 Reviews)</p>
                            </div>
                            <h3 class="title">
                                <a href="buy-details.html" tabindex="-1" class="mouse_go">Minimalist and bright flat</a> 
                            </h3>
                            <p><i class="feather-map-pin"></i> 518-520 8th Ave, New York, NY 10018, USA</p>
                            <ul class="property-category d-flex justify-content-between mb-0">
                                <li>
                                    <span class="list">Listed on : </span>
                                    <span class="date">18 Jan 2023</span>
                                </li>
                                <li>
                                    <span class="category list">Category : </span>
                                    <span class="category-value date">Flats</span>
                                </li>
                            </ul>
                        </div>
                    </div>		
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-custom">
                    <div class="profile-widget">
                        <div class="doc-img">
                            <a href="" class="property-img mouse_go">
                                <img class="img-fluid" alt="Property Image" src="{{asset('assets/media/banners/home-1.jpg')}}">
                            </a>
                            <div class="product-amount">
                                <span>$51,000</span>
                            </div>
                            <div class="feature-rating">
                                <div>
                                    <div class="featured">
                                        <span>Featured</span>
                                    </div>
                                </div>
                                <a href="javascript:void(0)">
                                    <div class="favourite  selected">
                                        <span><i class="fa-regular fa-heart"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="pro-content">
                            <div class="rating">
                                <span class="rating-count">
                                    <i class="fa-solid fa-star checked"></i>
                                    <i class="fa-solid fa-star checked"></i>
                                    <i class="fa-solid fa-star checked"></i>
                                    <i class="fa-solid fa-star checked"></i>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <p class="rating-review"><span>4.0</span>(13 Reviews)</p>
                            </div>
                            <h3 class="title">
                                <a href="buy-details.html" tabindex="-1" class="mouse_go">Minimalist and bright flat</a> 
                            </h3>
                            <p><i class="feather-map-pin"></i> 518-520 8th Ave, New York, NY 10018, USA</p>
                            <ul class="property-category d-flex justify-content-between mb-0">
                                <li>
                                    <span class="list">Listed on : </span>
                                    <span class="date">18 Jan 2023</span>
                                </li>
                                <li>
                                    <span class="category list">Category : </span>
                                    <span class="category-value date">Flats</span>
                                </li>
                            </ul>
                        </div>
                    </div>		
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-custom">
                    <div class="profile-widget">
                        <div class="doc-img">
                            <a href="" class="property-img mouse_go">
                                <img class="img-fluid" alt="Property Image" src="{{asset('assets/media/banners/home-1.jpg')}}">
                            </a>
                            <div class="product-amount">
                                <span>$51,000</span>
                            </div>
                            <div class="feature-rating">
                                <div>
                                    <div class="featured">
                                        <span>Featured</span>
                                    </div>
                                </div>
                                <a href="javascript:void(0)">
                                    <div class="favourite  selected">
                                        <span><i class="fa-regular fa-heart"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="pro-content">
                            <div class="rating">
                                <span class="rating-count">
                                    <i class="fa-solid fa-star checked"></i>
                                    <i class="fa-solid fa-star checked"></i>
                                    <i class="fa-solid fa-star checked"></i>
                                    <i class="fa-solid fa-star checked"></i>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <p class="rating-review"><span>4.0</span>(13 Reviews)</p>
                            </div>
                            <h3 class="title">
                                <a href="buy-details.html" tabindex="-1" class="mouse_go">Minimalist and bright flat</a> 
                            </h3>
                            <p><i class="feather-map-pin"></i> 518-520 8th Ave, New York, NY 10018, USA</p>
                            <ul class="property-category d-flex justify-content-between mb-0">
                                <li>
                                    <span class="list">Listed on : </span>
                                    <span class="date">18 Jan 2023</span>
                                </li>
                                <li>
                                    <span class="category list">Category : </span>
                                    <span class="category-value date">Flats</span>
                                </li>
                            </ul>
                        </div>
                    </div>		
                </div>
            </div>
        </div>
    </div>
</section>
@endsection