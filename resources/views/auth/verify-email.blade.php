@extends('layouts.guest')
@section('title','Verifiy Email')
@section('content')
<div class="d-flex flex-column flex-row-fluid position-relative p-7 overflow-hidden">
    <!--begin::Content body-->
    <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">

        <!--begin::Signin-->
        <div class="login-form login-signin">
            <!-- Session Status -->
            @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success">
                A new verification link has been sent to the email address you provided during registration.
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
                <h3 class="font-size-h1">Verify Email</h3>
                <p class="text-muted font-weight-bold">
                    Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
            </div>
            <!--begin::Form-->
            <form method="POST" action="{{ route('verification.send') }}" class="form" novalidate="novalidate" id="">
                @csrf
                
                <!--begin::Action-->
                <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                    <button type="submit" id="" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Resend Verification Email</button>
                    
                </div>
                <div class="form-group d-flex flex-wrap justify-content-end align-items-center">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
        
                        <button type="submit" class="btn btn-danger font-weight-bold px-9 py-4 my-3 w-100">
                            {{ __('Log Out') }}
                        </button>
                    </form>
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



