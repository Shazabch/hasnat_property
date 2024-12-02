@extends('layouts.app')
@section('title','Dashboard')
@section('content')

<div class="mx-4">
    <div class="bg-white rounded p-4">
        @include('profile.partials.update-profile-information-form')
    </div>
</div>

@endsection
