@extends('layouts.master')

@section('meta_title', 'Properties')
@section('meta_description', 'Properties')

@section('content')
    <style>
        .property_details_sec .nearby_locations_ul {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .property_details_sec .nearby_locations_ul li {
            width: calc(33.46% - 15px);
            justify-content: space-between;
            display: flex;
            flex-direction: row;
            background: rgba(244, 244, 244, 0.09);
            padding: 11px;
            align-items: center;
        }

        .property_details_sec .nearby_locations_ul.spec li {
            width: calc(50% - 15px);
            justify-content: space-between;
            display: flex;
            flex-direction: row;
            background: rgba(244, 244, 244, 0.09);
            padding: 11px;
            align-items: center;
        }

        .property_details_sec .nearby_locations_ul li span {
            font-size: 15px;
        }

        .property_details_sec .nearby_locations_ul li span b {
            font-weight: 600 !important;
        }
    </style>
    <section class="inner-banner">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title no-after pt-0 ps-0">
                        <p class="after-circle text-white text-thin after-circle mx-auto">Property Detail</p>
                        <h2 class="text-center text-secondary">{{ $property?->title }}</h2>
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
                        <span class="btn {{ $property->type === 'sale' ? 'bg-success' : 'bg-warning' }}">
                            {{ $property->type === 'sale' ? 'For Sale' : 'To Rent' }}
                        </span>
                    </div>
                    <div class="page-title">
                        <h3>{{ $property?->title }}<span><img src="{{ asset('front/assets/img/location-icon.svg') }}"
                                    alt="Image"></span></h3>
                        <p>
                            <i class="fa-solid fa-location-dot"></i> {{ $property?->adress }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="latest-update">
                        <h5>Last Updated on : <span class="" style="font-size: 0.875rem;">
                                <i class="bi bi-calendar-event"></i>
                                {{ $property?->created_at->format('F d, Y') }}
                            </span></h5>
                        <p><b>PKR :</b> <span>{{ $property?->price }}</span></p>
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
                                            <img src="{{ asset($property->main_image) }}" />
                                        </div>
                                        @foreach ($property->photos as $image)
                                            <div class="swiper-slide">
                                                <img src="{{ asset($image->image_name) }}" />
                                            </div>
                                        @endforeach

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
                                            <img src="{{ asset($property->main_image) }}" />
                                        </div>
                                        @foreach ($property->photos as $image)
                                            <div class="swiper-slide">
                                                <img src="{{ asset($image->image_name) }}" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="default-box-white section-title no-after property_details_sec">
                        <h2 class="mb-4 text-white"> Specifications</h2>
                        <div class="mb-4">
                            @if (count($property->specifications) > 0)
                                <div class="sub_div mt-3 px-0">

                                    <ul class="nearby_locations_ul spec">
                                        @foreach ($property->specifications as $specification)
                                            <li class="rounded">
                                                <div class="amenities_icon_box">
                                                    <img src="{{ asset($specification->icon) }}" alt="">
                                                    <p>{{ $specification->specification->name }}</p>
                                                </div>
                                                <span><b>{{ $specification->value }}</b></span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="default-box-white section-title no-after property_details_sec">
                        <h2 class="mb-4 text-white"> Amenities</h2>
                        <div class="mb-4">
                            @if (count($property->amenities) > 0)
                                <div class="sub_div mt-3 px-0">

                                    <ul class="nearby_locations_ul">
                                        @foreach ($property->amenities as $amenity)
                                            <li class="rounded">
                                                <div class="amenities_icon_box">
                                                <i class="{{ $amenity->icon }} text-light fa-lg text-center"></i>
                                                    <p>{{ $amenity->name }}</p>
                                                </div>
                                                <span><b>{{ $amenity->distance }}</b> kms</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>


                    <div class="default-box-white section-title no-after">
                        <h2 class="mb-4 text-white">Property Description</h2>
                        <div class="mb-4">
                            {!! $property?->description !!}
                        </div>
                    </div>
                    <div class="default-box-white section-title">
                        <h2 class="text-white">Location</h2>
                        <div class="col-lg-12">
                            <div class="address-area-wrap mt-3">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54402.864383959684!2d74.24621677440891!3d31.546701143426986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391903158ca766a7%3A0xe3dd62f16ee20e34!2sHaidri%20Shinwari%20Restaurant%20(Desi%20Food%20%26%20Fast%20Food)!5e0!3m2!1sen!2s!4v1717878828380!5m2!1sen!2s"
                                    width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="right-sidebar">
                        <a href="#" class="btn btn-primary prop-book">
                            <i class="bx bx-calendar"></i>Book Property
                        </a>
                        <!-- Enquiry -->
                          @livewire('admin.property_enquiry.property-enquiry-management-component',['property_id' => $property->id])
                        <!-- /Enquiry -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    @livewire('related-card-component')

@endsection
