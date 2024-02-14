@extends('dashboard.layouts.master')
@section('title')
    {{ __('Home') }}
@endsection



{{-- Add Custome css --}}
@push('styles')
    <link href="{{ asset('dashboard-assets/css/Dashboard.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    @if (auth('admin')->user()->status == 'pending' || auth('admin')->user()->status == 'block')
        @if (auth('admin')->user()->status == 'block')
            <!--begin::Alert-->
            <div class="alert alert-dismissible card my-awating d-flex flex-center  flex-column py-10 px-10 px-lg-20 mb-10">


                <!--begin::Icon-->
                <img src="{{ asset('dashboard-assets/media/auth/awaiting avatar.png') }}"
                    class="mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" alt="">
                <!--end::Icon-->

                <!--begin::Wrapper-->
                <div class="text-center">
                    <!--begin::Title-->
                    <h1 class="fw-bold mb-5">{{ __('Awaiting approval') }}</h1>
                    <!--end::Title-->

                    <!--begin::Content-->
                    <div class="mb-9 text-muted ">
                        Awaiting approval from the admin, <br /> <strong style='color: var(--kt-warning)'>patience is
                            required for a
                            little
                            while.</strong>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Alert-->
        @endif
        @if (auth('admin')->user()->status == 'block')
            <!--begin::Alert-->
            <div class="alert alert-dismissible bg-light-danger d-flex flex-center flex-column py-10 px-10 px-lg-20 mb-10">
                <!--begin::Close-->
                <button type="button" class="position-absolute top-0 end-0 m-2 btn btn-icon btn-icon-danger"
                    data-bs-dismiss="alert">
                    <i class="ki-duotone ki-cross fs-1">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2 13.02V14.9C2 15.58 2.4 16.54 2.88 17.02L6.98 21.12C7.46 21.6 8.42001 22 9.10001 22H14.9C15.58 22 16.54 21.6 17.02 21.12L21.12 17.02C21.6 16.54 22 15.58 22 14.9V9.10001C22 8.42001 21.6 7.46001 21.12 6.98001L17.02 2.88C16.54 2.4 15.58 2 14.9 2H9.10001C8.42001 2 7.46 2.4 6.98 2.88L2.88 6.98001C2.4 7.46001 2 8.42001 2 9.10001"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M8.5 15.5L15.5 8.5" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M15.5 15.5L8.5 8.5" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </i>
                </button>
                <!--end::Close-->

                <!--begin::Icon-->
                <i class="fs-5tx text-danger mb-5">
                    <svg width="100" height="50" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.93994 19.0799L19.0799 4.93994" stroke="white" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M2 13.02V14.9C2 15.58 2.4 16.54 2.88 17.02L6.98 21.12C7.46 21.6 8.42001 22 9.10001 22H14.9C15.58 22 16.54 21.6 17.02 21.12L21.12 17.02C21.6 16.54 22 15.58 22 14.9V9.10001C22 8.42001 21.6 7.46001 21.12 6.98001L17.02 2.88C16.54 2.4 15.58 2 14.9 2H9.10001C8.42001 2 7.46 2.4 6.98 2.88L2.88 6.98001C2.4 7.46001 2 8.42001 2 9.10001"
                            stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </i>
                <!--end::Icon-->

                <!--begin::Wrapper-->
                <div class="text-center">
                    <!--begin::Title-->
                    <h1 class="fw-bold mb-5">{{ __('You are banned.') }}</h1>
                    <!--end::Title-->

                    <!--begin::Separator-->
                    <div class="separator separator-dashed border-danger opacity-25 mb-5"></div>
                    <!--end::Separator-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Alert-->
        @endif
    @else
        <!--begin::Top 3 Users-->


        <div class="row ">

            <div class="col-12 col-xl-8">
                <div class="separator separator-dotted separator-content mb-15">
                    <span class="w-250px h3">{{ __('Top 3 Users') }}</span>
                </div>
                <!--end::Top 3 Users-->
                <!--begin::Row-->
                <div class="row g-5 main-user-card align-items-end justify-content-center g-xl-8">

                    @foreach ($topAdmins as $admin)
                        <div class="card-parent p-0 ">
                            <!--begin::Statistics Widget 2-->
                            <div class="card my-card  mb-xl-8 ">
                                <!--begin::Body-->
                                <div class="image">
                                    <img src="{{ asset('dashboard-assets\media\svg\shapes\crown.png') }}" alt=''
                                        class='card-img-top' />
                                    <img src="{{ getImageUserPath($admin->image, 'Admins') }}" alt=""
                                        class="" />

                                    <div class="degree"> <span>2</span></div>
                                </div>
                                <div class="card-body d-flex align-items-center pt-3 pb-0">
                                    <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                                        <div class="fw-bold card-name fs-4 mb-2">{{ $admin->full_name }}</div>

                                        <span class="fw-semibold card-point  fs-2x" data-kt-countup="true"
                                            data-kt-countup-value="{{ $admin->bugs_count }}">0</span>
                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Statistics Widget 2-->
                        </div>
                    @endforeach
                </div>
                <!--end::Row-->


                <div class="main-quick-status border-white shadow">
                    <!--begin::Top 3 Users-->
                    <div class="separator separator-dotted  separator-content my-15">
                        <span class="w-250px h3">{{ __('Quick stats') }}</span>
                    </div>
                    <!--end::Top 3 Users-->

                    <!--begin::Row-->
                    <div class="row   quick-status  g-5 g-xl-8">
                        <div class="quick-status-inner p-0 ">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('dashboard.admins.index') }}"
                                class="card  hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon-->
                                    <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="61" height="60"
                                            viewBox="0 0 61 60" fill="none">
                                            <path
                                                d="M45.4996 19.775C45.4246 19.775 45.3746 19.775 45.2996 19.775H45.1746C40.4496 19.625 36.9246 15.975 36.9246 11.475C36.9246 6.87503 40.6746 3.15002 45.2496 3.15002C49.8246 3.15002 53.5746 6.90003 53.5746 11.475C53.5496 16 50.0246 19.65 45.5246 19.8C45.5246 19.775 45.5246 19.775 45.4996 19.775ZM45.2496 6.87504C42.7246 6.87504 40.6746 8.92504 40.6746 11.45C40.6746 13.925 42.5996 15.925 45.0746 16.025C45.0996 16 45.2996 16 45.5246 16.025C47.9496 15.9 49.8246 13.9 49.8496 11.45C49.8496 8.92504 47.7996 6.87504 45.2496 6.87504Z"
                                                fill="#FA5A7D" />
                                            <path
                                                d="M45.525 38.2001C44.55 38.2001 43.575 38.125 42.6 37.9501C41.575 37.7751 40.9 36.8001 41.075 35.7751C41.25 34.7501 42.225 34.0751 43.25 34.2501C46.325 34.7751 49.575 34.2001 51.75 32.7501C52.925 31.9751 53.55 31.0001 53.55 30.0251C53.55 29.0501 52.9 28.1001 51.75 27.3251C49.575 25.8751 46.275 25.3001 43.175 25.8501C42.15 26.0501 41.175 25.3501 41 24.3251C40.825 23.3001 41.5 22.3251 42.525 22.1501C46.6 21.4251 50.825 22.2001 53.825 24.2001C56.025 25.6751 57.3 27.7751 57.3 30.0251C57.3 32.2501 56.05 34.3751 53.825 35.8751C51.55 37.3751 48.6 38.2001 45.525 38.2001Z"
                                                fill="#FA5A7D" />
                                            <path
                                                d="M15.425 19.775C15.4 19.775 15.375 19.775 15.375 19.775C10.875 19.625 7.34995 15.975 7.32495 11.475C7.32495 6.87499 11.075 3.125 15.65 3.125C20.225 3.125 23.975 6.875 23.975 11.45C23.975 15.975 20.45 19.625 15.95 19.775L15.425 17.9L15.6 19.775C15.55 19.775 15.475 19.775 15.425 19.775ZM15.675 16.025C15.825 16.025 15.95 16.025 16.1 16.05C18.325 15.95 20.275 13.95 20.275 11.475C20.275 8.94999 18.225 6.89999 15.7 6.89999C13.175 6.89999 11.125 8.94999 11.125 11.475C11.125 13.925 13.025 15.9 15.45 16.05C15.475 16.025 15.575 16.025 15.675 16.025Z"
                                                fill="#FA5A7D" />
                                            <path
                                                d="M15.4 38.2001C12.325 38.2001 9.375 37.3751 7.1 35.8751C4.9 34.4001 3.625 32.2751 3.625 30.0251C3.625 27.8001 4.9 25.6751 7.1 24.2001C10.1 22.2001 14.325 21.4251 18.4 22.1501C19.425 22.3251 20.1 23.3001 19.925 24.3251C19.75 25.3501 18.775 26.0501 17.75 25.8501C14.65 25.3001 11.375 25.8751 9.175 27.3251C8 28.1001 7.375 29.0501 7.375 30.0251C7.375 31.0001 8.025 31.9751 9.175 32.7501C11.35 34.2001 14.6 34.7751 17.675 34.2501C18.7 34.0751 19.675 34.7751 19.85 35.7751C20.025 36.8001 19.35 37.7751 18.325 37.9501C17.35 38.125 16.375 38.2001 15.4 38.2001Z"
                                                fill="#FA5A7D" />
                                            <path
                                                d="M30.4996 38.45C30.4246 38.45 30.3746 38.45 30.2996 38.45H30.1746C25.4496 38.3 21.9246 34.65 21.9246 30.15C21.9246 25.55 25.6746 21.825 30.2496 21.825C34.8246 21.825 38.5746 25.575 38.5746 30.15C38.5496 34.675 35.0246 38.325 30.5246 38.475C30.5246 38.45 30.5246 38.45 30.4996 38.45ZM30.2496 25.55C27.7246 25.55 25.6746 27.6 25.6746 30.125C25.6746 32.6 27.5996 34.6 30.0746 34.7C30.0996 34.675 30.2996 34.675 30.5246 34.7C32.9496 34.575 34.8246 32.575 34.8496 30.125C34.8496 27.625 32.7996 25.55 30.2496 25.55Z"
                                                fill="#FA5A7D" />
                                            <path
                                                d="M30.4995 56.8999C27.4995 56.8999 24.4995 56.125 22.1745 54.55C19.9745 53.075 18.6995 50.975 18.6995 48.725C18.6995 46.5 19.9495 44.3499 22.1745 42.8749C26.8495 39.7749 34.1745 39.7749 38.8245 42.8749C41.0245 44.3499 42.2995 46.4499 42.2995 48.6999C42.2995 50.9249 41.0495 53.075 38.8245 54.55C36.4995 56.1 33.4995 56.8999 30.4995 56.8999ZM24.2495 46.025C23.0745 46.8 22.4495 47.7749 22.4495 48.7499C22.4495 49.7249 23.0995 50.6749 24.2495 51.4499C27.6245 53.7249 33.3495 53.7249 36.7245 51.4499C37.8995 50.6749 38.5245 49.7 38.5245 48.725C38.5245 47.75 37.8745 46.8 36.7245 46.025C33.3745 43.75 27.6495 43.775 24.2495 46.025Z"
                                                fill="#FA5A7D" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->

                                    <div class=" fw-bold my-text-color fs-2 mb-2 mt-5">{{ $countAdmins }}</div>
                                    <div class="fw-semibold my-text-color ">{{ __('Admins') }}</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>


                        <div class="quick-status-inner p-0">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('dashboard.bugs.index') }}" class="card  hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                                            viewBox="0 0 60 60" fill="none">
                                            <path
                                                d="M22.5 32.5C20.85 33.325 19.475 34.55 18.45 36.075C17.875 36.95 17.875 38.05 18.45 38.925C19.475 40.45 20.85 41.675 22.5 42.5"
                                                stroke="#FF947A" stroke-width="4" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M38.025 32.5C39.675 33.325 41.05 34.55 42.075 36.075C42.65 36.95 42.65 38.05 42.075 38.925C41.05 40.45 39.675 41.675 38.025 42.5"
                                                stroke="#FF947A" stroke-width="4" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M5 32.5V37.5C5 50 10 55 22.5 55H37.5C50 55 55 50 55 37.5V22.5C55 10 50 5 37.5 5H22.5C10 5 5 10 5 22.5"
                                                stroke="#FF947A" stroke-width="4" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M5.57501 20.025L53.625 20" stroke="#FF947A" stroke-width="4"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->

                                    <div class=" fw-bold fs-2 my-text-color mb-2 mt-5">{{ $countBugs }}</div>
                                    <div class="fw-semibold my-text-color ">{{ __('Bugs') }}</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>

                        <div class="quick-status-inner p-0">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('dashboard.projects.index') }}"
                                class="card  hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                    <span class="svg-icon svg-icon-dark svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="61" height="60"
                                            viewBox="0 0 61 60" fill="none">
                                            <path
                                                d="M48 15H43C43 8 37.5 2.5 30.5 2.5C23.5 2.5 18 8 18 15H13C10.25 15 8 17.25 8 20V50C8 52.75 10.25 55 13 55H48C50.75 55 53 52.75 53 50V20C53 17.25 50.75 15 48 15ZM30.5 7.5C34.75 7.5 38 10.75 38 15H23C23 10.75 26.25 7.5 30.5 7.5ZM48 50H13V20H48V50ZM30.5 30C26.25 30 23 26.75 23 22.5H18C18 29.5 23.5 35 30.5 35C37.5 35 43 29.5 43 22.5H38C38 26.75 34.75 30 30.5 30Z"
                                                fill="#3CD856" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class=" fw-bold fs-2 my-text-color mb-2 mt-5">{{ $countProjects }}</div>
                                    <div class="fw-semibold my-text-color ">{{ __('Projects') }}</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>

                        <div class="quick-status-inner p-0">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('dashboard.awards.index') }}"
                                class="card  hoverable card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/graphs/gra007.svg-->
                                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                                            viewBox="0 0 60 60" fill="none">
                                            <path
                                                d="M49.9251 25H9.92505V45C9.92505 52.5 12.425 55 19.925 55H39.9251C47.4251 55 49.9251 52.5 49.9251 45V25Z"
                                                stroke="#BF83FF" stroke-width="4" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M53.75 17.5V20C53.75 22.75 52.425 25 48.75 25H11.25C7.425 25 6.25 22.75 6.25 20V17.5C6.25 14.75 7.425 12.5 11.25 12.5H48.75C52.425 12.5 53.75 14.75 53.75 17.5Z"
                                                stroke="#BF83FF" stroke-width="4" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M29.1 12.5H15.2999C14.4499 11.575 14.475 10.15 15.375 9.24998L18.925 5.69998C19.85 4.77498 21.375 4.77498 22.3 5.69998L29.1 12.5Z"
                                                stroke="#BF83FF" stroke-width="4" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M44.675 12.5H30.875L37.675 5.69998C38.6 4.77498 40.125 4.77498 41.05 5.69998L44.6 9.24998C45.5 10.15 45.525 11.575 44.675 12.5Z"
                                                stroke="#BF83FF" stroke-width="4" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M22.35 25V37.85C22.35 39.85 24.55 41.025 26.225 39.95L28.575 38.4C29.425 37.85 30.5 37.85 31.325 38.4L33.55 39.9C35.2 41 37.425 39.825 37.425 37.825V25H22.35Z"
                                                stroke="#BF83FF" stroke-width="4" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class=" fw-bold fs-2 my-text-color mb-2 mt-5">{{ $countAwards }}</div>
                                    <div class="fw-semibold my-text-color ">{{ __('Awards') }}</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>

                        <div class="quick-status-inner p-0">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('dashboard.statuses.index') }}"
                                class="card  hoverable card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/graphs/gra007.svg-->
                                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                                            viewBox="0 0 60 60" fill="none">
                                            <path
                                                d="M41.0501 19.875C47.1501 25.975 47.1501 35.875 41.0501 41.975C34.9501 48.075 25.0501 48.075 18.9501 41.975C12.8501 35.875 12.8501 25.975 18.9501 19.875C25.0501 13.775 34.9501 13.775 41.0501 19.875Z"
                                                fill="#2AE7D7" />
                                            <path
                                                d="M20.6249 55.975C20.3999 55.975 20.1499 55.925 19.9249 55.85C14.2999 53.6 9.74989 49.625 6.69989 44.375C3.74989 39.25 2.57489 33.45 3.34989 27.55C3.47489 26.525 4.44989 25.8 5.44989 25.925C6.47489 26.05 7.19989 27 7.07489 28.025C6.42489 33.1 7.42489 38.1 9.94989 42.5C12.5499 47 16.4749 50.425 21.2999 52.35C22.2499 52.75 22.7249 53.825 22.3499 54.8C22.0749 55.525 21.3499 55.975 20.6249 55.975Z"
                                                fill="#2AE7D7" />
                                            <path
                                                d="M14.6251 13.075C14.0751 13.075 13.5251 12.825 13.1501 12.35C12.5001 11.55 12.6501 10.375 13.4751 9.72499C18.2251 5.99999 23.9501 4.02499 30.0001 4.02499C35.9001 4.02499 41.5251 5.92499 46.2501 9.52499C47.0751 10.15 47.2251 11.325 46.6001 12.15C45.9751 12.975 44.8001 13.125 43.9751 12.5C39.9001 9.39999 35.0751 7.77499 30.0001 7.77499C24.8001 7.77499 19.8751 9.47499 15.7751 12.675C15.4251 12.95 15.0251 13.075 14.6251 13.075Z"
                                                fill="#2AE7D7" />
                                            <path
                                                d="M39.3751 55.9751C38.6251 55.9751 37.9251 55.5251 37.6251 54.8001C37.2501 53.8501 37.7001 52.7501 38.6751 52.3501C43.5001 50.4001 47.4251 47.0001 50.0251 42.5001C52.5751 38.1001 53.5751 33.1001 52.9001 28.0501C52.7751 27.0251 53.5001 26.0751 54.5251 25.9501C55.5251 25.8251 56.5001 26.5501 56.6251 27.5751C57.3751 33.4501 56.2251 39.2751 53.2751 44.4001C50.2501 49.6501 45.6751 53.6001 40.0501 55.8751C39.8501 55.9251 39.6251 55.9751 39.3751 55.9751Z"
                                                fill="#2AE7D7" />
                                        </svg>


                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class=" fw-bold fs-2 mb-2 my-text-color mt-5">{{ $countStatuses }}</div>
                                    <div class="fw-semibold my-text-color">{{ __('Statuses') }}</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>


                    </div>
                    <!--end::Row-->
                </div>





            </div>
            <div class="col-xl-4   col-12">


                <div class="col-12 status">
                    <!--begin::List Widget 2-->
                    <div class="card  card-xl-stretch mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header row flex justify-content-between align-items-center border-0">
                            <h3 class="card-title fw-bold  text-dark">{{ __(' Status') }}</h3>
                            <a href="#"> <button>See all</button>


                            </a>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body px-2 pt-2">

                            <table class="table">


                                <thead>

                                    <tr>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Num Bugs') }}</th>

                                        <th>{{ __('Rating') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($topUsers as $user)
                                        <!--begin::Item-->
                                        <tr>
                                            <!-- Avatar, Name, and Email in the same column -->
                                            <td style='width:130px'>
                                                <div class="d-flex align-items-center" style='width:130px'>
                                                    <div class="symbol symbol-50px me-3">
                                                        <img src="{{ getImageUserPath($user->immage, 'Users') }}"
                                                            class="" alt="" />
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="text-dark fw-bold my-font ">{{ $user->full_name }}
                                                        </div>
                                                        <span
                                                            class="text-muted d-block fw-bold my-font">{{ $user->email }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <!-- Rating -->
                                            <td>
                                                <div class="rate">
                                                    <span
                                                        class="badge badge-light-success fs-8 fw-bold">{{ $user->bugs_responsible_admin_count }}</span>
                                                </div>
                                            </td>
                                            <td>

                                                <div class="progress-bar-container">
                                                    <div class="progress-bar" style="width: 45%;"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!--end::Item-->
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List Widget 2-->
                </div>



                <div class="col-12 status">
                    <!--begin::List Widget 2-->
                    <div class="card  card-xl-stretch mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header row flex justify-content-between align-items-center border-0">
                            <h3 class="card-title fw-bold  text-dark">{{ __('Assigned users bugs') }}</h3>
                            <a href="#"> <button>See all</button>


                            </a>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body px-2 pt-2">

                            <table class="table">


                                <thead>

                                    <tr>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Num Bugs') }}</th>

                                        <th>{{ __('Rating') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($topUsers as $user)
                                        <!--begin::Item-->
                                        <tr>
                                            <!-- Avatar, Name, and Email in the same column -->
                                            <td style='width:130px'>
                                                <div class="d-flex align-items-center" style='width:130px'>
                                                    <div class="symbol symbol-50px me-3">
                                                        <img src="{{ getImageUserPath($user->immage, 'Users') }}"
                                                            class="" alt="" />
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="text-dark fw-bold my-font ">{{ $user->full_name }}
                                                        </div>
                                                        <span
                                                            class="text-muted d-block fw-bold my-font">{{ $user->email }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <!-- Rating -->
                                            <td>
                                                <div class="rate">
                                                    <span
                                                        class="badge badge-light-success fs-8 fw-bold">{{ $user->bugs_responsible_admin_count }}</span>
                                                </div>
                                            </td>
                                            <td>

                                                <div class="progress-bar-container">
                                                    <div class="progress-bar" style="width: 45%;"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!--end::Item-->
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List Widget 2-->
                </div>



            </div>

        </div>


        <div class="row">
            <div class=" product">
                <!--begin::List Widget 1-->
                <div class="card card-xl-stretch mb-5 mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-dark">{{ __('Top 5 Projects') }}</span>
                            <span class="text-muted mt-1 fw-semibold fs-7">{{ __('Most projects have bugs') }}</span>
                        </h3>
                    </div>
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div class="card-body pt-5">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    <th>{{ __('Numbers') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($topProjects as $index => $project)
                                    <!--begin::Item-->
                                    <tr>
                                        <!-- Numbering -->
                                        <td>{{ $index + 1 }}</td>
                                        <!-- Title -->
                                        <td>
                                            <a href="{{ route('dashboard.projects.show', $project->id) }}"
                                                class="text-gray-800 text-hover-primary fw-bold fs-6">{{ $project->title }}</a>
                                        </td>
                                        <!-- Description -->
                                        <td>
                                            <span
                                                class="text-muted fw-semibold descripe d-block">{!! Str::limit($project->description, '50') !!}</span>
                                        </td>
                                        <!-- Bugs Count -->
                                        <td>
                                            <div class="number badge badge-light-success fs-8 fw-bold"> <span
                                                    class="">{{ $project->bugs_count }}</span> </div>
                                        </td>
                                    </tr>
                                    <!--end::Item-->
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::List Widget 1-->
            </div>











            <div class=" count-status p-0 card">
                <!--begin::Top Users-->
                <div class="separator my-title separator-dotted separator-content px-6 py-15">
                    <span class="w-250px h3">{{ __('User Count By Status') }}</span>
                </div>
                <!--end::Top 3 Users-->

                <div
                    class="d-flex flex-wrap flex-center align-items-start all-card justify-content-lg-between count-status-body px-5 ">
                    <!--begin::Item-->
                    <div class="d-flex flex-column flex-center h-170px small-card card w-130px h-lg-140px w-lg-130px   ">
                        <!--begin::Symbol-->


                        <!--begin::Info-->
                        <div class="text-center">
                            <!--begin::Value-->


                            <!--begin::Label-->
                            <span class="text-gray-600 fw-semibold fs-5 lh-0">
                                {{ __('Active') }}
                            </span>
                            <!--end::Label-->
                            <div class="fs-lg-2hx fs-2x fw-bold text-gray-500 d-flex flex-center">
                                <div class="min-w-70px text-center" data-kt-countup="true"
                                    data-kt-countup-value="{{ $countAdminsActive }}">0</div>
                            </div>
                            <!--end::Value-->
                        </div>
                        <!--end::Info-->

                        <span class="svg-icon svg-icon-muted svg-icon-5hx fs-4x text-success mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="63" height="63" viewBox="0 0 63 63"
                                fill="none">
                                <path
                                    d="M31.5 31.5C38.7487 31.5 44.625 25.6237 44.625 18.375C44.625 11.1263 38.7487 5.25 31.5 5.25C24.2513 5.25 18.375 11.1263 18.375 18.375C18.375 25.6237 24.2513 31.5 31.5 31.5Z"
                                    stroke="#8E6FAF" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M8.95123 57.75C8.95123 47.5913 19.0575 39.375 31.5 39.375C34.02 39.375 36.4612 39.7162 38.745 40.3462"
                                    stroke="#8E6FAF" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M57.75 47.25C57.75 49.2188 57.1988 51.0825 56.2275 52.6575C55.6763 53.6025 54.9675 54.4425 54.1538 55.125C52.3163 56.7787 49.9012 57.75 47.25 57.75C43.4175 57.75 40.0837 55.7025 38.2725 52.6575C37.3012 51.0825 36.75 49.2188 36.75 47.25C36.75 43.9425 38.2725 40.9763 40.6875 39.06C42.4987 37.6163 44.7825 36.75 47.25 36.75C53.0513 36.75 57.75 41.4487 57.75 47.25Z"
                                    stroke="#15BD44" stroke-width="4" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <div class="d-flex flex-column flex-center h-140px small-card card w-130px h-lg-170px w-lg-130px    ">
                        <!--begin::Symbol-->


                        <!--begin::Info-->
                        <div class="text-center">


                            <!--begin::Label-->
                            <span class="text-gray-600 fw-semibold fs-5 lh-0">
                                {{ __('Pending') }}
                            </span>
                            <!--end::Label-->
                            <!--begin::Value-->
                            <div class="fs-lg-2hx fs-2x fw-bold text-gray-500 d-flex flex-center">
                                <div class="min-w-70px" data-kt-countup="true"
                                    data-kt-countup-value="{{ $countAdminsPending }}">0
                                </div>
                            </div>
                            <!--end::Value-->
                        </div>
                        <!--end::Info-->

                        <span class="svg-icon svg-icon-muted svg-icon-5hx fs-4x text-warning mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="63" height="63" viewBox="0 0 63 63"
                                fill="none">
                                <path
                                    d="M45.6488 41.1337L35.0438 31.5H27.93L17.325 41.1337C14.3588 43.8112 13.3875 47.9325 14.8313 51.66C16.275 55.3612 19.7925 57.75 23.7563 57.75H39.2175C43.2075 57.75 46.6988 55.3612 48.1425 51.66C49.5863 47.9325 48.615 43.8112 45.6488 41.1337ZM36.2775 47.6175H26.7225C25.725 47.6175 24.9375 46.8037 24.9375 45.8325C24.9375 44.8612 25.7513 44.0475 26.7225 44.0475H36.2775C37.275 44.0475 38.0625 44.8612 38.0625 45.8325C38.0625 46.8037 37.2488 47.6175 36.2775 47.6175Z"
                                    fill="#FB8DA4" />
                                <path
                                    d="M48.1687 11.34C46.725 7.63875 43.2075 5.25 39.2437 5.25H23.7562C19.7925 5.25 16.275 7.63875 14.8312 11.34C13.4137 15.0675 14.385 19.1888 17.3512 21.8662L27.9562 31.5H35.07L45.675 21.8662C48.615 19.1888 49.5862 15.0675 48.1687 11.34ZM36.2775 18.9788H26.7225C25.725 18.9788 24.9375 18.165 24.9375 17.1938C24.9375 16.2225 25.7512 15.4087 26.7225 15.4087H36.2775C37.275 15.4087 38.0625 16.2225 38.0625 17.1938C38.0625 18.165 37.2487 18.9788 36.2775 18.9788Z"
                                    fill="#FB8DA4" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->


                    </div>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <div class="d-flex flex-column flex-center small-card h-140px card w-130px h-lg-170px w-lg-130px    ">
                        <!--begin::Symbol-->



                        <!--begin::Info-->
                        <div class="text-center">
                            <!--begin::Value-->


                            <!--begin::Label-->
                            <span class="text-gray-600 fw-semibold fs-5 lh-0">
                                {{ __('Block') }}
                            </span>
                            <!--end::Label-->
                            <div class="fs-lg-2hx fs-2x fw-bold text-gray-500 d-flex flex-center">
                                <div class="min-w-70px" data-kt-countup="true"
                                    data-kt-countup-value="{{ $countAdminsBlock }}">0
                                </div>
                            </div>
                            <!--end::Value-->
                        </div>
                        <!--end::Info-->
                        <span class="svg-icon svg-icon-muted svg-icon-5hx fs-4x text-danger mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" viewBox="0 0 55 55"
                                fill="none">
                                <path
                                    d="M39.0042 6.60001C37.9042 5.50001 35.7042 4.58334 34.1459 4.58334H20.8542C19.2959 4.58334 17.0959 5.50001 15.9959 6.60001L6.60004 15.9958C5.50004 17.0958 4.58337 19.2958 4.58337 20.8542V34.1458C4.58337 35.7042 5.50004 37.9042 6.60004 39.0042L10.1063 42.5104L42.5105 10.1063L39.0042 6.60001Z"
                                    fill="#FB8DA4" />
                                <path
                                    d="M48.4 15.9958L44.9396 12.5354L12.5354 44.9396L15.9958 48.4C17.0958 49.5 19.2958 50.4167 20.8542 50.4167H34.1458C35.7042 50.4167 37.9042 49.5 39.0042 48.4L48.4 39.0042C49.5 37.9042 50.4167 35.7042 50.4167 34.1458V20.8542C50.4167 19.2958 49.5 17.0958 48.4 15.9958Z"
                                    fill="#FB8DA4" />
                                <path
                                    d="M5.70632 46.9104C5.04174 47.575 5.04174 48.675 5.70632 49.3396C6.05007 49.6834 6.48549 49.8438 6.92091 49.8438C7.35632 49.8438 7.79174 49.6834 8.13549 49.3396L12.5355 44.9396L10.1063 42.5104L5.70632 46.9104Z"
                                    fill="transparent" />
                                <path
                                    d="M49.3397 8.13543C50.0043 7.47085 50.0043 6.37085 49.3397 5.70626C48.6751 5.04168 47.5751 5.04168 46.9105 5.70626L42.5105 10.1063L44.9397 12.5354L49.3397 8.13543Z"
                                    fill="transparent" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Item-->
                </div>
            </div>









            <!--begin::Detailed statistics-->
            <div class="separator separator-dotted separator-content my-15">
                <span class="w-250px h3">{{ __('Detailed statistics') }}</span>
            </div>
            <!--end::Detailed statistics-->

            <!--begin::Row-->
            <div class="row g-5 g-xl-8">






                <div class="col-12 top-status">
                    <!--begin::List Widget 3-->
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0">
                            <h3 class="card-title fw-bold text-dark">{{ __('Top 5 Statuses') }}</h3>
                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body pt-2">

                            @forelse($topStatus as $status)
                                <!--begin::Item-->
                                <div class="d-flex align-items-center mb-8">
                                    <!--begin::Description-->
                                    <div class="flex-grow-1">
                                        <div class="text-gray-800 fw-bold fs-6">{{ $status->title }}</div>
                                        @if ($status->is_default == 1)
                                            <span class="text-success fw-semibold d-block"> {{ __('Default') }}</span>
                                        @else
                                            <span class="text-danger fw-semibold d-block">
                                                {{ __('Not the default') }}</span>
                                        @endif
                                    </div>
                                    <!--end::Description-->
                                    <span class="badge badge-light-success fs-8 fw-bold">{{ $status->bugs_count }}</span>
                                </div>
                                <!--end:Item-->
                            @empty
                            @endforelse
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end:List Widget 3-->
                </div>
            </div>
            <!--end::Row-->
    @endif
@endsection





@push('scripts')
    <link href="{{ asset('dashboard-assets/css/Dashboard.css') }}" rel="stylesheet" type="text/css" />
@endpush
