@extends('layouts.master')

@section('meta_title', "Properties")
@section('meta_description', "Properties")

@section('content')
<section class="inner-banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title no-after pt-0 ps-0">
                    <p class="after-circle text-white text-thin after-circle mx-auto">Property Detail</p>
                    <h2 class="text-center text-secondary">My Property Name</h2>
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
<section class="section-property-detail">
    <div class="container">
        <div class="row align-items-center page-head">
            <div class="col-lg-8">
                <div class="buy-btn">
                    <span class="buy">Buy</span>
                    <span class="appartment">Appartment</span>
                </div>
                <div class="page-title">
                    <h3>Modern Apartment in the City Center<span><img src="{{asset('front/assets/img/location-icon.svg')}}" alt="Image"></span></h3>
                    <p>
                        <i class="fa-solid fa-location-dot"></i> 318-330 S Oakley Blvd, Chicago, IL 60612, USA</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="latest-update">
                    <h5>Last Updated on : 15 Jan 2023</h5>
                    <p>$4,000</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="default-box-white mt-4 property-detail-images-wrap">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="property-detail-slider-wrap">
                            <div class="swiper property-detail-slider2 mb-20">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/media/banners/home-1.jpg')}}" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/media/banners/home-1.jpg')}}" class="obj_fit" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/media/banners/home-1.jpg')}}" class="obj_fit" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/media/banners/home-1.jpg')}}" class="obj_fit" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/media/banners/home-1.jpg')}}" class="obj_fit" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/media/banners/home-1.jpg')}}" class="obj_fit" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/media/banners/home-1.jpg')}}" class="obj_fit" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/media/banners/home-1.jpg')}}" class="obj_fit" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/media/banners/home-1.jpg')}}" class="obj_fit" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/media/banners/home-1.jpg')}}" class="obj_fit" />
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                                <div class="swiper-button-next">
                                    <i class="fa-sharp fa-solid fa-chevron-right"></i>
                                </div>
                                <div class="swiper-button-prev">
                                    <i class="fa-sharp fa-solid fa-chevron-left"></i>
                                </div>
                            </div>
                            <div thumbsSlider="" class="swiper property-detail-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/media/banners/home-1.jpg')}}" class="obj_fit" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/media/banners/home-1.jpg')}}" class="obj_fit" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/media/banners/home-1.jpg')}}" class="obj_fit" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/media/banners/home-1.jpg')}}" class="obj_fit" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/media/banners/home-1.jpg')}}" class="obj_fit" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/media/banners/home-1.jpg')}}" class="obj_fit" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/media/banners/home-1.jpg')}}" class="obj_fit" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/media/banners/home-1.jpg')}}" class="obj_fit" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/media/banners/home-1.jpg')}}" class="obj_fit" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/media/banners/home-1.jpg')}}" class="obj_fit" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="default-box-white section-title no-after">
                    <h2 class="mb-4 text-white">Property Description</h2>
                    <div class="mb-4">
                        <p>
                            This 3-bed with a loft, 2-bath home in the gated community of The Hideout has it
                            all. From the open floor plan to the
                            abundance of light from the windows, this home is perfect for entertaining. The
                            living room and dining room have vaulted
                            ceilings and a beautiful fireplace. You will love spending time on the deck
                            taking in the beautiful views. In the
                            kitchen, you'll find stainless steel appliances and a tile backsplash, as well
                            as a breakfast bar.
                        </p>
                        <p>
                            Placeholder content for this accordion, which is intended to demonstrate the
                            class. This is the first item's accordion
                            body you get groundbreaking performance and amazing battery life. Add to that a
                            stunning Liquid Retina XDR display, the
                            best camera and audio ever in a Mac notebook, and all the ports you needs
                        </p>
                    </div>
                </div>
                <div class="default-box-white section-title">
                    <h2 class="text-white">Location</h2>
                    <div class="col-lg-12">
                        <div class="address-area-wrap mt-3">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54402.864383959684!2d74.24621677440891!3d31.546701143426986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391903158ca766a7%3A0xe3dd62f16ee20e34!2sHaidri%20Shinwari%20Restaurant%20(Desi%20Food%20%26%20Fast%20Food)!5e0!3m2!1sen!2s!4v1717878828380!5m2!1sen!2s" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="right-sidebar">
                    <a href="rental-order.html" class="btn btn-primary prop-book">
                        <i class="bx bx-calendar"></i>Book Property
                    </a>
                    <!-- Enquiry -->
                    <div class="sidebar-card">
                        <div class="sidebar-card-title">
                            <h5>Request Info</h5>
                        </div>
                        <form action="#">
                            <div class="review-form">
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="review-form">
                                <input type="email" class="form-control" placeholder="Your Email">
                            </div>
                            <div class="review-form">
                                <input type="text" class="form-control" placeholder="Your Phone Number">
                            </div>
                            <div class="review-form">
                                <textarea rows="5" placeholder="Yes, I'm Interested"></textarea>
                            </div>
                            <div class="review-form submit-btn">
                                <button type="submit" class="btn-primary">Send Email</button>
                            </div>
                        </form>
                        <div class="connect-us row g-2">
                            <div class="col-md-6">
                                <a href="javascript:void(0);">
                                    <i class="fa-solid fa-phone"></i>
                                    Call Us
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="javascript:void(0);">
                                    <i class="fa-brands fa-whatsapp"></i>
                                    Whatsapp
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Enquiry -->                   
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-dark2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title no-after pt-0 ps-0">
                    <p class="after-circle text-thin after-circle mx-auto text-white">Research and Market Insights</p>
                    <h2 class="text-center text-secondary">Similar Listings</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="product-custom">
                    <div class="profile-widget">
                        <div class="doc-img">
                            <a href="{{route('properties-detail')}}" class="property-img mouse_go">
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
                                <a href="{{route('properties-detail')}}" tabindex="-1" class="mouse_go">Minimalist and bright flat</a> 
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
                            <a href="{{route('properties-detail')}}" class="property-img mouse_go">
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
                                <a href="{{route('properties-detail')}}" tabindex="-1" class="mouse_go">Minimalist and bright flat</a> 
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
                            <a href="{{route('properties-detail')}}" class="property-img mouse_go">
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
                                <a href="{{route('properties-detail')}}" tabindex="-1" class="mouse_go">Minimalist and bright flat</a> 
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