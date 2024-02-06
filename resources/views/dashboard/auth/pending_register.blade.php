@extends('dashboard.auth.layouts.master')
@section('title')
    {{__('Pending Register')}}
@endsection

@push('styles')
    <link href="{{ asset('dashboard-assets/css/Pending.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('titleAndText')
    <!--begin::Title-->
    <h1 class=" fs-2qx fw-bold text-center mb-7" style='color:var(--kt-gray-400)'>{{__('Well done, you have registered')}}</h1><!--end::Title-->

    <!--begin::Text-->
    <div class=" fs-base text-center fw-semibold" style='color:var(--kt-text-light-300)'>{{__('You have to wait for the admin to approve you')}}
        <br>
        <a href="{{route('login-form')}}" class="opacity-75-hover text-primary me-1">{{__('To go to the login page')}}</a>
    </div><!--end::Text-->
@endsection



@push('scripts')

 <link href="{{ asset('dashboard-assets/css/Pending.css') }}" rel="stylesheet" type="text/css"/>

@endpush
