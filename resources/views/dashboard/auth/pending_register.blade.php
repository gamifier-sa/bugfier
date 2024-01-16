@extends('dashboard.auth.layouts.master')
@section('title')
    {{__('Pending Register')}}
@endsection

@section('titleAndText')
    <!--begin::Title-->
    <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">{{__('Well done, you have registered')}}</h1><!--end::Title-->

    <!--begin::Text-->
    <div class="text-gray-600 fs-base text-center fw-semibold">You have to wait for the admin to approve you
        <br>
        <a href="{{route('login-form')}}" class="opacity-75-hover text-primary me-1">To go to the login page</a>
    </div><!--end::Text-->
@endsection
