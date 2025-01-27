@extends('layouts.master')

@section('meta_title', "{Projects}")
@section('meta_description', "Projects")

@section('content')
<section class="inner-banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title no-after pt-0 ps-0">

                    <p class="after-circle text-white text-thin after-circle mx-auto">Property Projects</p>

                    <div class="page-title-item mt-0 mx-auto">
                        <ul class="text-center">
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li>
                                <i class="icofont-simple-right"></i>
                            </li>
                            <li>Project Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shape-bg">
        <img class="shape" src="{{ asset($project->image) }}">
    </div>
</section>
<section class="doctor-about">
    <div class="container">
        <div class="wrapper">
            <div class="content">
                <h2 class="title">{{ $project->title}}</h2>

                <p class="text-white">
                    {{ $project->description }}
                </p>


            </div>
            <div class="thumb">

                <div class="position-relative img_anim_reveal">
                    <img src="{{ asset($project->image) }}" alt="doctor thumb" width="516" height="720">
                </div>
            </div>

        </div>



    </div>

</section>
<section class="bg-light">
<div class="container mt-4 ">
      {!! $project->content !!}
    </div>
</section>
@endsection