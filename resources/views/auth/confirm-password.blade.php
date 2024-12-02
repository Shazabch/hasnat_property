@extends('layouts.guest')
@section('title','Confirm Password')
@section('content')
<div class="d-flex flex-column flex-row-fluid position-relative p-7 overflow-hidden">
    <!--begin::Content body-->
    <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">

        <!--begin::Signin-->
        <div class="login-form login-signin">

            <!-- Session Status -->
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            
            <!-- Validation Errors -->
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
            @endif

            <div class="text-center mb-10 mb-lg-20">
                <h3 class="font-size-h1">Confirm Password</h3>
                <p class="text-muted font-weight-bold">This is a secure area of the application. Please confirm your password before continuing.</p>
            </div>
            <!--begin::Form-->
            <form method="POST" action="{{ route('password.confirm') }}" class="form" novalidate="novalidate" id="">
                @csrf

                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="Password" name="password" required autocomplete="current-password" />
                </div>
                
                <!--begin::Action-->
                <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                    <button type="submit" id="" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Confirm</button>        
                </div>

                <!--end::Action-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Signin-->
        
    </div>
    <!--end::Content body-->
    <!--begin::Content footer for mobile-->
    <div class="d-flex d-lg-none flex-column-auto flex-column flex-sm-row justify-content-between align-items-center mt-5 p-5">
        <div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">© {{date('Y')}} Dr Irfan Malik</div>
        <div class="d-flex order-1 order-sm-2 my-2">
            <a href="{{asset('#')}}" class="text-dark-75 text-hover-primary"></a>
        </div>
    </div>
    <!--end::Content footer for mobile-->
</div>

@endsection