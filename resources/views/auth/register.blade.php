@extends('layouts.guest')
@section('title','Sign Up')
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
                <h3 class="font-size-h1">Sign Up</h3>
                <p class="text-muted font-weight-bold">Enter your details to begin</p>
            </div>
            <!--begin::Form-->
            <form method="POST" action="{{ route('register') }}" class="form" novalidate="novalidate" id="">
                @csrf
                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-5 px-6" type="text" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus />
                </div>
                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-5 px-6" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required />
                </div>
                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="Password"  type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="Password"  type="password" name="password_confirmation" required />
                </div>

                <!--begin::Action-->
                <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                    @if (Route::has('password.request'))
                    <a href="{{ route('login') }}" class="text-dark-50 text-hover-primary my-3 mr-2" id="">Already registered ?</a>
                    @endif
                    <button type="submit" id="" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Register</button>
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
        <div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">© {{date('Y')}} DrHasnat Properties</div>
        <div class="d-flex order-1 order-sm-2 my-2">
            <a href="{{asset('#')}}" class="text-dark-75 text-hover-primary"></a>
        </div>
    </div>
    <!--end::Content footer for mobile-->
</div>

@endsection


