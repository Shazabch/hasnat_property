@extends('layouts.app')

@section('title', 'Publications')

@section('content')
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Publication Authors</h5>
            <!--end::Page Title-->
            <!--begin::Actions-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
            <span class=" font-weight-bold mr-4">Publication Authors</span>
            {{-- <a href="#" class="btn btn-light-warning font-weight-bolder btn-sm">User Management</a> --}}
            <!--end::Actions-->
        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->
        <div class="d-flexs align-items-center">
            {{-- <a href="{{ route('admin.publications.create') }}" class="btn btn-light-warning font-weight-bolder btn-sm">Create New Publication</a> --}}
        </div>
        <!--end::Toolbar-->
    </div>
</div>
    <div class="row mx-2">
        <div class="col-12">
            @livewire('admin.publications.author-management-component')
        </div>
    </div>
@endsection
