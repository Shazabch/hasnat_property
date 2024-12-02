@extends('layouts.guest')
@section('title','Log In')
@section('content')
<div class="d-flex flex-column flex-row-fluid position-relative p-7 overflow-hidden">
    <!--begin::Content header-->
    {{-- <div class="position-absolute top-0 right-0 text-right mt-5 mb-15 mb-lg-0 flex-column-auto justify-content-center py-5 px-10">
        <span class="font-weight-bold text-dark-50">Dont have an account yet?</span>
        <a href="" class="font-weight-bold ml-2" id="">Sign Up!</a>
    </div> --}}
    <!--end::Content header-->
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
                <h3 class="font-size-h1">Sign In</h3>
                <p class="text-muted font-weight-bold">Enter your username and password</p>
            </div>
            <!--begin::Form-->
            <form method="POST" action="{{ route('login') }}" class="form" novalidate="novalidate" id="">
                @csrf
                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-5 px-6" type="email" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="off" />
                </div>
                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="Password"  type="password" name="password" required autocomplete="current-password" />
                </div>
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
                <!--begin::Action-->
                <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-dark-50 text-hover-primary my-3 mr-2" id="">Forgot Password ?</a>
                    @endif
                    <button type="submit" id="" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Sign In</button>
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