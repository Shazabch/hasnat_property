@extends('layouts.guest')
@section('title','Reset Password')
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
                <h3 class="font-size-h1">Reset Password</h3>
                <p class="text-muted font-weight-bold">Enter your new password. We will reset your password.</p>
            </div>
            <!--begin::Form-->
            <form method="POST" action="{{ route('password.store') }}" class="form" novalidate="novalidate" id="">
                @csrf
                 <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-5 px-6" placeholder="Email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus />
                </div>

                <!-- Password -->
                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-5 px-6" placeholder="New Password" type="password" name="password" required />
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <input id="password_confirmation" class="form-control form-control-solid h-auto py-5 px-6" placeholder="Confirm New Password" type="password" name="password_confirmation" required />
                </div>

                <!--begin::Action-->
                <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                    <button type="submit" id="" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Reset Password</button>
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

