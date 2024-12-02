@extends('layouts.master')

@section('meta_title', $condition->meta_title)
@section('meta_description', $condition->meta_description)

@section('content')
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
                            <img src="{{ asset('front/assets/img/f1.svg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-detail-content bg-cream">
            <div class="list-group-wrap">
                <div class="d-block d-lg-none sticky_dropdown">
                    <select id="mobile-dropdown" class="form-select">
                        @foreach ($condition->contentTabs as $tab)
                            <option value="#section-{{ $tab->id }}">{{ $tab->tab_heading }}</option>
                        @endforeach
                    </select>
                </div>
                  
                  <!-- List group for larger screens -->
                  <div class="list-group d-none d-lg-block scroll_to_bar_wrap">
                    <div class="list-group-inner container">
                        @foreach ($condition->contentTabs as $tab)
                            <a class="list-group-item list-group-item-action" href="#section-{{ $tab->id }}">{{ $tab->tab_heading }}</a>
                        @endforeach
                    </div>
                  </div>
                <div class="">
                    <div class="row justify-content-center py-5">
                        <div class="section-detail-content">
                            @foreach ($condition->contentSections as $section)
                            <div class="content" id="section-{{ $section->id }}">
                                <div class="sideby-section {{ getBg($section->bg_type) }}">
                                    <div class="container">
                                    @if($section->image && $section->image_position == 'full_after')
                                        @if($section->title)
                                        <h2>{{ $section->title }}</h2>
                                        @endif
                                        {!! $section->content !!}
                                    {{-- Full Width after section --}}
                                    <div class="row align-items-center">
                                        <div class="col-lg-12">
                                            <div class="img_wrap">
                                                <img src="{{ asset($section->image) }}" alt="{{ $section->image_alt }}">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Right Image --}}
                                    @elseif($section->image && $section->image_position == 'right')
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 pe-lg-4 mb-lg-0 mb-3">
                                                @if($section->title)<h2>{{ $section->title }}</h2>@endif
                                                {!! $section->content !!}
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="img_wrap">
                                                    <img src="{{ asset($section->image) }}" alt="{{ $section->image_alt }}">
                                                </div>
                                            </div>
                                        </div>
                                    {{-- Left Image --}}
                                    @elseif($section->image && $section->image_position == 'left')
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 mb-lg-0 mb-3">
                                                <div class="img_wrap">
                                                    <img src="{{ asset($section->image) }}" alt="{{ $section->image_alt }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 ps-lg-4">
                                                @if($section->title)<h2>{{ $section->title }}</h2>@endif
                                                {!! $section->content !!}
                                            </div>
                                        </div>
                                    {{-- No Image --}}
                                    @else
                                    @if($section->title)<h2>{{ $section->title }}</h2>@endif
                                    {!! $section->content !!}
                                    @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                            {{-- <div class="content" id="overview">
                                <h2>What is persistent spinal pain?</h2>
                                <p>Persistent spinal pain refers to chronic discomfort that affects the back and neck, often lasting
                                    for an extended period. It can significantly impact your daily life and overall well-being. At
                                    The London Spine Clinic, we understand the challenges associated with this condition and are
                                    committed to providing comprehensive care to help manage your persistent spinal pain
                                    effectively.
                                </p>
                            </div> --}}
                            {{-- <div class="content" id="symptoms">
                                <h2>Symptoms</h2>
                                <p>Back and neck pain can affect people of all age groups.
            
                                    Treating back and neck pain involves a coordinated team of spinal specialists.
            
                                    Some symptoms of persistent pain can include:</p>
                                <ul>
                                    <li><strong>Uneven shoulder or hip alignment: </strong>Scoliosis can cause one shoulder or hip
                                        to appear higher than the other, creating an asymmetrical appearance.</li>
                                    <li><strong>Asymmetrical waistline: </strong>The waistline may appear uneven or have a prominent
                                        curve on one side.</li>
                                    <li><strong>Visible abnormal curvature of the spine when bending forward:</strong> A noticeable
                                        curve or hump may be visible when the individual bends forward, indicating the presence of
                                        scoliosis.</li>
                                    <li><strong>Back pain: </strong>Some individuals with scoliosis may experience discomfort or
                                        pain in their back, particularly in the affected area of the spine.</li>
                                    <li><strong>Muscle stiffness: </strong>Stiffness in the back muscles may be experienced, making
                                        it challenging to move or rotate the spine.</li>
                                    <li><strong>Limited mobility:</strong> Scoliosis can restrict the range of motion in the spine,
                                        leading to reduced flexibility and difficulty performing certain activities.</li>
                                </ul>

                                <h2>When to see a consultant</h2>
                            <p>It is essential to seek medical attention if you experience any of the following:</p>
            
            
                            <ul>
                                <li>evere pain that does not improve with rest or over-the-counter pain medication: If your pain is
                                    severe and persists despite self-care measures, it's important to consult a medical professional
                                    for a proper evaluation.</li>
                                <li>Pain accompanied by weakness, numbness, or tingling in the arms, legs, or pelvic region: These
                                    symptoms may indicate nerve compression or damage and require immediate medical attention.</li>
                                <li>Loss of bladder or bowel control: If you experience a loss of bladder or bowel control along
                                    with persistent spinal pain, it could be a sign of a serious underlying condition, and urgent
                                    medical assessment at your nearest Accident & Emergency (A&E) is necessary.</li>
                                <li>Pain following a fall, injury, or trauma to the back or neck: If your persistent spinal pain is
                                    a result of an injury, it's important to have it evaluated by a healthcare professional to
                                    determine the extent of the damage.</li>
                                <li>Symptoms that interfere with daily activities and quality of life: If your persistent spinal
                                    pain significantly impacts your ability to perform daily tasks or affects your overall
                                    well-being and quality of life, it's advisable to seek medical guidance for appropriate
                                    management.</li>
                            </ul>

                            </div> --}}
                            {{-- <div class="content" id="causes">
                                <h2>Causes of Persistent Spinal Pain</h2>
                                <p>Persistent spinal pain can have various underlying causes, including:</p>        
                                <ul>
                                <li>Degenerative conditions such as osteoarthritis, spinal stenosis, or damaged discs: These conditions involve wear and tear or age-related changes in the spinal structures, leading to persistent pain and discomfort.</li>
                                <li>Traumatic injuries to the spine, such as fractures or sprains: Accidents or traumatic events can cause damage to the spinal structures, resulting in ongoing pain.</li>
                                <li>Muscle or ligament strains: Overuse, poor posture, or sudden movements can strain the muscles and ligaments supporting the spine, leading to persistent pain.</li>
                                <li>Inflammation of the spinal joints: Conditions like ankylosing spondylitis or other forms of arthritis can cause chronic inflammation in the spinal joints, contributing to ongoing pain.</li>
                                <li>Nerve impingement or compression: When nerves in the spine become compressed or irritated due to conditions like damaged discs or spinal stenosis, persistent pain can result.</li>
                                <li>Medical conditions like fibromyalgia or autoimmune disorders.</li>
                                </ul>
                            </div> --}}
                            {{-- <div class="content" id="diagnostic">
                                <h2>Diagnostic</h2>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita aut eaque delectus dolores? Cum sapiente adipisci aspernatur doloremque, veniam ad autem rerum vitae voluptas, voluptate, eum ratione vero ipsum soluta!</p>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas saepe corrupti eius eos earum delectus reiciendis est vel ducimus. Explicabo, dolores itaque! Illo, eum consectetur. Neque velit possimus est at?</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
                            </div> --}}
                            {{-- <div class="content" id="treatmentoptions">    
                                <h2>Treatment Options</h2>
                                <div>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita aut eaque delectus dolores? Cum sapiente adipisci aspernatur doloremque, veniam ad autem rerum vitae voluptas, voluptate, eum ratione vero ipsum soluta!</p>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas saepe corrupti eius eos earum delectus reiciendis est vel ducimus. Explicabo, dolores itaque! Illo, eum consectetur. Neque velit possimus est at?</p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- left image right content -->
        <section class="sideby-section bg_dark">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 pe-lg-4 mb-lg-0 mb-3">
                        <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere?</h2>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem aliquam est ratione animi inventore corrupti officiis, sequi enim incidunt blanditiis a praesentium provident repellendus, asperiores repellat? Cum officiis quasi, magnam nostrum ex delectus expedita nemo aliquam et excepturi ratione pariatur aspernatur temporibus minus deserunt tempora sunt suscipit aperiam accusantium explicabo.
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <div class="img_wrap">
                            <img src="{{ asset('front/assets/img/appointment/1.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- right content left img -->
        <section class="sideby-section bg_light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-lg-0 mb-3">
                        <div class="img_wrap">
                            <img src="{{ asset('front/assets/img/appointment/1.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 ps-lg-4">
                        <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere?</h2>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem aliquam est ratione animi inventore corrupti officiis, sequi enim incidunt blanditiis a praesentium provident repellendus, asperiores repellat? Cum officiis quasi, magnam nostrum ex delectus expedita nemo aliquam et excepturi ratione pariatur aspernatur temporibus minus deserunt tempora sunt suscipit aperiam accusantium explicabo.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- bg-white -->
        <section class="sideby-section bg-white">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-lg-0 mb-3">
                        <div class="img_wrap">
                            <img src="{{ asset('front/assets/img/appointment/1.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 ps-lg-4">
                        <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere?</h2>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem aliquam est ratione animi inventore corrupti officiis, sequi enim incidunt blanditiis a praesentium provident repellendus, asperiores repellat? Cum officiis quasi, magnam nostrum ex delectus expedita nemo aliquam et excepturi ratione pariatur aspernatur temporibus minus deserunt tempora sunt suscipit aperiam accusantium explicabo.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Full width -->
        <section class="sideby-section bg_dark">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="img_wrap">
                            <img src="{{ asset('front/assets/img/appointment/1.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="speciality-area overflow-x py-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-down" data-aos-duration="1500" data-aos-delay="100">
                                <div class="speciality-item speciality-wrap">
                                    <div class="speciality-top">
                                        <img src="{{ asset('front/assets/img/11.jpg') }}" alt="">
                                    </div>
                                    <div class="speciality-inner mb-0">
                                        <h3>Cervical spine surgery</h3>
                                        <p>Surgical treatment for neck spine issues</p>
                                        <a href="{{ route('conditions.detail', 1) }}" class="btn sm">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-down" data-aos-duration="1500" data-aos-delay="300">
                                <div class="speciality-item speciality-wrap">
                                    <div class="speciality-top">
                                        <img src="{{ asset('front/assets/img/11.jpg') }}" alt="">
                                    </div>
                                    <div class="speciality-inner mb-0">
                                        <h3>Craniotomy (brain surgery)</h3>
                                        <p>Opening the skull for brain access.</p>
                                        <a href="{{ route('conditions.detail', 1) }}" class="btn sm">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-down" data-aos-duration="1500" data-aos-delay="500">
                                <div class="speciality-item speciality-wrap">
                                    <div class="speciality-top">
                                        <img src="{{ asset('front/assets/img/11.jpg') }}" alt="">
                                    </div>
                                    <div class="speciality-inner mb-0">
                                        <h3>Lumbar laminectomy</h3>
                                        <p>Removes spinal bone to relieve nerve pressure.</p>
                                        <a href="{{ route('conditions.detail', 1) }}" class="btn sm">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@include('website.common.appointment-cta')
@include('website.common.partner')
@include('website.common.newsletter')
@endsection