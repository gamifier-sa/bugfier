@extends('dashboard.auth.layouts.master')
@section('title')
    {{ __('Pending Register') }}
@endsection
@push('styles')
    <link href="{{ asset('dashboard-assets/css/Pending.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('images')
    <!--begin::Image-->
    <img class="theme-light-show mx-auto mw-100 w-150px over-avatar w-lg-300px mb-10 mb-lg-20"
        src="{{ asset('dashboard-assets/media/auth/agency2.png') }}" alt="" />
    <img class="theme-dark-show mx-auto mw-100 w-150px over-avatar w-lg-300px mb-10 mb-lg-20"
        src="{{ asset('dashboard-assets/media/auth/agency2dark.png') }}" alt="" />
    <!--end::Image-->
    <img class="avatar-bg " src="{{ asset('dashboard-assets/media/auth/bg12.png') }}" alt="" />
@endsection

@section('titleAndText')
    <h1 class=" fs-2qx fw-bold text-center over-avatar mb-7" style='color:var(--kt-gray-400)'>
        {{ __('Well done, you have registered') }}
    </h1><!--end::Title-->

    <!--begin::Text-->
    <div class=" fs-5 text-center fw-semibold over-avatar" style='color:var(--kt-text-light-300)'>
        {{ __('You have to wait for the admin to approve you') }}
        <br>

        <a href="{{ route('login-form') }}" class="opacity-75-hover over-avatar text-gold me-1"
            style='color: var(--kt-warning)'>{{ __('To go to the login page') }}</a>
    </div><!--end::Text-->
@endsection

@push('scripts')
    <link href="{{ asset('dashboard-assets/css/Pending.css') }}" rel="stylesheet" type="text/css" />
@endpush
