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
                    <h2 class="text-center text-secondary">Expertise</h2>
                    <p class="text-center text-white">Renowned for his exceptional skill, Mr.Hasnat Properties is a leading consultant neurosurgeon and complex spinal surgeon with 30+ years of experience. His expertise spans Endoscopic, Minimally Invasive and Robotic Spine Surgery for various spinal conditions, including degenerative, traumatic, and malignant disorders.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="shape-bg">
        <img class="shape" src="{{ asset('front/assets/img/banners/hero-bg.webp') }}">
    </div>
</section>

<!-- Expertise -->
<section class="speciality-area overflow-x py-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach ($expertises as $expertise)
                        @include('website.expertise.card', ['expertise' => $expertise])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Technologies and Methods -->
@include('website.common.tech-methods')

<!-- Methodology Section -->
<section class="bg-light pt-100 pb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 pe-lg-5">
                <p class="mb-0 after-circle after-circle p-16">Ensure A Great Health through</p>
                <h2 class="h2-lg text-primary">Collaborative care</h2>
                <p>Mr.Hasnat Properties, an esteemed spinal surgeon, prioritises patient-centric care through a collaborative model. This multidisciplinary approach ensures patients receive comprehensive, specialised attention, yielding optimal results and improved well-being.</p>
                <ul>
                    <li><strong>Initial Assessment:</strong> Thorough patient evaluation and diagnosis</li>
                    <li><strong>Team Collaboration:</strong> Multidisciplinary discussion for tailored treatment plans</li>
                    <li><strong>Coordinated Implementation:</strong> Seamless care delivery and monitoring</li>
                    <li><strong>Continuous Communication:</strong> Regular updates and feedback for optimal care</li>
                </ul>
            </div>
            <div class="col-lg-5 methodology-slider">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                    <div class="carousel-item methodology-item active">
                        <h4>01</h4>
                        <h3>Diagnosis in Collaborative Care</h3>
                        <p>In Mr.Hasnat Properties's collaborative care model, diagnosis is a comprehensive and multidisciplinary process. This approach ensures accuracy, efficiency, and effective treatment planning.</p>
                        {{-- <a href="" class="theme_color bg-white btn-2 mt-4">DISCOVER MORE</a> --}}
                    </div>
                    <div class="carousel-item methodology-item">
                        <h4>02</h4>
                            <h3>Collaborative Care Benefits</h3>
                            <p>
                                Efficient &amp; Effective Marketing Strategies to Build Your Brand With the help of the best marketing strategy, Cynosure Designs, the top advertising agency in the UK &amp; UAE, assists businesses in establishing an enduring Brand Image in the thoughts of their target consumers.
                            </p>
                            <ul>
                                <li>Improved patient outcomes and quality of life</li>
                                <li>Enhanced patient satisfaction and experience</li>
                                <li>⁠Reduced complications and risks</li>
                            </ul>
                            {{-- <a href="" class="theme_color bg-white btn-2 mt-4">DISCOVER MORE</a> --}}
                    </div>
                    <div class="carousel-item methodology-item">
                        <h4>03</h4>
                            <h3>Collaborative Care Philosophy</h3>
                            <p>We understand that each patient's experience is distinct. Our multidisciplinary approach ensures comprehensive care, integrating physical, emotional, and social support for optimal well-being.</p>
                            {{-- <a href="" class="theme_color bg-white btn-2 mt-4">DISCOVER MORE</a> --}}
                    </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@include('website.common.partner')
@include('website.common.newsletter')
@endsection