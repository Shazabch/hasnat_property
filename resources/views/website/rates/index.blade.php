@extends('layouts.master')

@section('meta_title', "rates")
@section('meta_description', "rates")

@section('content')
<section class="inner-banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title no-after pt-0 ps-0">

                    <p class="after-circle text-white text-thin after-circle mx-auto"> Property Rates</p>

                    <div class="page-title-item mt-0 mx-auto">
                        <ul class="text-center">
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shape-bg">
        <img class="shape" src="{{ asset($rate->image) }}">
    </div>
</section>

<section class="bg-light">
    <div class="container mt-4 text-center">
        {!! $rate->content !!}
    </div>
</section>
@endsection