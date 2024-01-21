@extends('dashboard.layouts.master')
@section('title') {{ __("Home") }} @endsection

@section('content')
    @if(auth('admin')->user()->status == 'pending' || auth('admin')->user()->status == 'block')
        @if(auth('admin')->user()->status == 'pending')
            <!--begin::Alert-->
            <div class="alert alert-dismissible bg-light-danger d-flex flex-center flex-column py-10 px-10 px-lg-20 mb-10">
                <!--begin::Close-->
                <button type="button" class="position-absolute top-0 end-0 m-2 btn btn-icon btn-icon-danger" data-bs-dismiss="alert">
                    <i class="ki-duotone ki-cross fs-1">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 13.02V14.9C2 15.58 2.4 16.54 2.88 17.02L6.98 21.12C7.46 21.6 8.42001 22 9.10001 22H14.9C15.58 22 16.54 21.6 17.02 21.12L21.12 17.02C21.6 16.54 22 15.58 22 14.9V9.10001C22 8.42001 21.6 7.46001 21.12 6.98001L17.02 2.88C16.54 2.4 15.58 2 14.9 2H9.10001C8.42001 2 7.46 2.4 6.98 2.88L2.88 6.98001C2.4 7.46001 2 8.42001 2 9.10001" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8.5 15.5L15.5 8.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15.5 15.5L8.5 8.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </i>
                </button>
                <!--end::Close-->

                <!--begin::Icon-->
                <i class="fs-5tx text-danger mb-5">
                    <svg width="100" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 7.75V13" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2.91992 8.58003C2.91992 7.46003 3.51993 6.41999 4.48993 5.84999L10.4299 2.42C11.3999 1.86 12.6 1.86 13.58 2.42L19.52 5.84999C20.49 6.40999 21.09 7.45003 21.09 8.58003V15.42C21.09 16.54 20.49 17.58 19.52 18.15L13.58 21.58C12.61 22.14 11.4099 22.14 10.4299 21.58L4.48993 18.15C3.51993 17.59 2.91992 16.55 2.91992 15.42V12.66" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 16.2V16.2999" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </i>
                <!--end::Icon-->

                <!--begin::Wrapper-->
                <div class="text-center">
                    <!--begin::Title-->
                    <h1 class="fw-bold mb-5">{{__('Awaiting approval')}}</h1><!--end::Title-->

                    <!--begin::Separator-->
                    <div class="separator separator-dashed border-danger opacity-25 mb-5"></div><!--end::Separator-->

                    <!--begin::Content-->
                    <div class="mb-9 text-gray-900">
                        Awaiting approval from the admin, <strong>patience is required for a little while.</strong>
                    </div><!--end::Content-->
                </div><!--end::Wrapper-->
            </div><!--end::Alert-->
        @endif
        @if(auth('admin')->user()->status == 'block')
            <!--begin::Alert-->
            <div class="alert alert-dismissible bg-light-danger d-flex flex-center flex-column py-10 px-10 px-lg-20 mb-10">
                <!--begin::Close-->
                <button type="button" class="position-absolute top-0 end-0 m-2 btn btn-icon btn-icon-danger" data-bs-dismiss="alert">
                    <i class="ki-duotone ki-cross fs-1">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 13.02V14.9C2 15.58 2.4 16.54 2.88 17.02L6.98 21.12C7.46 21.6 8.42001 22 9.10001 22H14.9C15.58 22 16.54 21.6 17.02 21.12L21.12 17.02C21.6 16.54 22 15.58 22 14.9V9.10001C22 8.42001 21.6 7.46001 21.12 6.98001L17.02 2.88C16.54 2.4 15.58 2 14.9 2H9.10001C8.42001 2 7.46 2.4 6.98 2.88L2.88 6.98001C2.4 7.46001 2 8.42001 2 9.10001" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8.5 15.5L15.5 8.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15.5 15.5L8.5 8.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </i>
                </button>
                <!--end::Close-->

                <!--begin::Icon-->
                <i class="fs-5tx text-danger mb-5">
                    <svg width="100" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.93994 19.0799L19.0799 4.93994" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 13.02V14.9C2 15.58 2.4 16.54 2.88 17.02L6.98 21.12C7.46 21.6 8.42001 22 9.10001 22H14.9C15.58 22 16.54 21.6 17.02 21.12L21.12 17.02C21.6 16.54 22 15.58 22 14.9V9.10001C22 8.42001 21.6 7.46001 21.12 6.98001L17.02 2.88C16.54 2.4 15.58 2 14.9 2H9.10001C8.42001 2 7.46 2.4 6.98 2.88L2.88 6.98001C2.4 7.46001 2 8.42001 2 9.10001" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                </i>
                <!--end::Icon-->

                <!--begin::Wrapper-->
                <div class="text-center">
                    <!--begin::Title-->
                    <h1 class="fw-bold mb-5">{{__('You are banned.')}}</h1><!--end::Title-->

                    <!--begin::Separator-->
                    <div class="separator separator-dashed border-danger opacity-25 mb-5"></div><!--end::Separator-->
                </div><!--end::Wrapper-->
            </div><!--end::Alert-->
        @endif
    @else
        <!--begin::Top Users-->
        <div class="separator separator-dotted separator-content my-15">
            <span class="w-250px h3">{{__('User Count By Status')}}</span>
        </div>
        <!--end::Top 3 Users-->

        <div class="d-flex flex-wrap flex-center justify-content-lg-between mx-auto w-xl-1001px">
            <!--begin::Item-->
            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bg-light rounded-circle">
                <!--begin::Symbol-->
                <span class="svg-icon svg-icon-muted svg-icon-5hx fs-4x text-success mb-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.0001 7.16C17.9401 7.15 17.8701 7.15 17.8101 7.16C16.4301 7.11 15.3301 5.98 15.3301 4.58C15.3301 3.15 16.4801 2 17.9101 2C19.3401 2 20.4901 3.16 20.4901 4.58C20.4801 5.98 19.3801 7.11 18.0001 7.16Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.9704 14.4402C18.3404 14.6702 19.8504 14.4302 20.9104 13.7202C22.3204 12.7802 22.3204 11.2402 20.9104 10.3002C19.8404 9.59016 18.3104 9.35016 16.9404 9.59016" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M5.97047 7.16C6.03047 7.15 6.10047 7.15 6.16047 7.16C7.54047 7.11 8.64047 5.98 8.64047 4.58C8.64047 3.15 7.49047 2 6.06047 2C4.63047 2 3.48047 3.16 3.48047 4.58C3.49047 5.98 4.59047 7.11 5.97047 7.16Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7.00043 14.4402C5.63043 14.6702 4.12043 14.4302 3.06043 13.7202C1.65043 12.7802 1.65043 11.2402 3.06043 10.3002C4.13043 9.59016 5.66043 9.35016 7.03043 9.59016" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.0001 14.6302C11.9401 14.6202 11.8701 14.6202 11.8101 14.6302C10.4301 14.5802 9.33008 13.4502 9.33008 12.0502C9.33008 10.6202 10.4801 9.47021 11.9101 9.47021C13.3401 9.47021 14.4901 10.6302 14.4901 12.0502C14.4801 13.4502 13.3801 14.5902 12.0001 14.6302Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14.9097 17.7804C13.3197 16.7204 10.6897 16.7204 9.08973 17.7804C7.67973 18.7204 7.67973 20.2603 9.08973 21.2003C10.6897 22.2703 13.3097 22.2703 14.9097 21.2003" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span><!--end::Svg Icon-->

                <!--begin::Info-->
                <div class="text-center">
                    <!--begin::Value-->
                    <div class="fs-lg-2hx fs-2x fw-bold text-gray-500 d-flex flex-center">
                        <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="{{$countAdminsActive}}">0</div>
                    </div><!--end::Value-->

                    <!--begin::Label-->
                    <span class="text-gray-600 fw-semibold fs-5 lh-0">
                        {{__('Active')}}
                    </span><!--end::Label-->
                </div><!--end::Info-->
            </div><!--end::Item-->

            <!--begin::Item-->
            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bg-light rounded-circle">
                <!--begin::Symbol-->
                <span class="svg-icon svg-icon-muted svg-icon-5hx fs-4x text-warning mb-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.0001 7.16C17.9401 7.15 17.8701 7.15 17.8101 7.16C16.4301 7.11 15.3301 5.98 15.3301 4.58C15.3301 3.15 16.4801 2 17.9101 2C19.3401 2 20.4901 3.16 20.4901 4.58C20.4801 5.98 19.3801 7.11 18.0001 7.16Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.9704 14.4402C18.3404 14.6702 19.8504 14.4302 20.9104 13.7202C22.3204 12.7802 22.3204 11.2402 20.9104 10.3002C19.8404 9.59016 18.3104 9.35016 16.9404 9.59016" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M5.97047 7.16C6.03047 7.15 6.10047 7.15 6.16047 7.16C7.54047 7.11 8.64047 5.98 8.64047 4.58C8.64047 3.15 7.49047 2 6.06047 2C4.63047 2 3.48047 3.16 3.48047 4.58C3.49047 5.98 4.59047 7.11 5.97047 7.16Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7.00043 14.4402C5.63043 14.6702 4.12043 14.4302 3.06043 13.7202C1.65043 12.7802 1.65043 11.2402 3.06043 10.3002C4.13043 9.59016 5.66043 9.35016 7.03043 9.59016" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.0001 14.6302C11.9401 14.6202 11.8701 14.6202 11.8101 14.6302C10.4301 14.5802 9.33008 13.4502 9.33008 12.0502C9.33008 10.6202 10.4801 9.47021 11.9101 9.47021C13.3401 9.47021 14.4901 10.6302 14.4901 12.0502C14.4801 13.4502 13.3801 14.5902 12.0001 14.6302Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14.9097 17.7804C13.3197 16.7204 10.6897 16.7204 9.08973 17.7804C7.67973 18.7204 7.67973 20.2603 9.08973 21.2003C10.6897 22.2703 13.3097 22.2703 14.9097 21.2003" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span><!--end::Svg Icon-->

                <!--begin::Info-->
                <div class="text-center">
                    <!--begin::Value-->
                    <div class="fs-lg-2hx fs-2x fw-bold text-gray-500 d-flex flex-center">
                        <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="{{$countAdminsPending}}">0</div>
                    </div><!--end::Value-->

                    <!--begin::Label-->
                    <span class="text-gray-600 fw-semibold fs-5 lh-0">
                        {{__('Pending')}}
                    </span><!--end::Label-->
                </div><!--end::Info-->
            </div><!--end::Item-->

            <!--begin::Item-->
            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bg-light rounded-circle">
                <!--begin::Symbol-->
                <span class="svg-icon svg-icon-muted svg-icon-5hx fs-4x text-danger mb-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.0001 7.16C17.9401 7.15 17.8701 7.15 17.8101 7.16C16.4301 7.11 15.3301 5.98 15.3301 4.58C15.3301 3.15 16.4801 2 17.9101 2C19.3401 2 20.4901 3.16 20.4901 4.58C20.4801 5.98 19.3801 7.11 18.0001 7.16Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.9704 14.4402C18.3404 14.6702 19.8504 14.4302 20.9104 13.7202C22.3204 12.7802 22.3204 11.2402 20.9104 10.3002C19.8404 9.59016 18.3104 9.35016 16.9404 9.59016" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M5.97047 7.16C6.03047 7.15 6.10047 7.15 6.16047 7.16C7.54047 7.11 8.64047 5.98 8.64047 4.58C8.64047 3.15 7.49047 2 6.06047 2C4.63047 2 3.48047 3.16 3.48047 4.58C3.49047 5.98 4.59047 7.11 5.97047 7.16Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7.00043 14.4402C5.63043 14.6702 4.12043 14.4302 3.06043 13.7202C1.65043 12.7802 1.65043 11.2402 3.06043 10.3002C4.13043 9.59016 5.66043 9.35016 7.03043 9.59016" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.0001 14.6302C11.9401 14.6202 11.8701 14.6202 11.8101 14.6302C10.4301 14.5802 9.33008 13.4502 9.33008 12.0502C9.33008 10.6202 10.4801 9.47021 11.9101 9.47021C13.3401 9.47021 14.4901 10.6302 14.4901 12.0502C14.4801 13.4502 13.3801 14.5902 12.0001 14.6302Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14.9097 17.7804C13.3197 16.7204 10.6897 16.7204 9.08973 17.7804C7.67973 18.7204 7.67973 20.2603 9.08973 21.2003C10.6897 22.2703 13.3097 22.2703 14.9097 21.2003" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span><!--end::Svg Icon-->


                <!--begin::Info-->
                <div class="text-center">
                    <!--begin::Value-->
                    <div class="fs-lg-2hx fs-2x fw-bold text-gray-500 d-flex flex-center">
                        <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="{{$countAdminsBlock}}">0</div>
                    </div><!--end::Value-->

                    <!--begin::Label-->
                    <span class="text-gray-600 fw-semibold fs-5 lh-0">
                        {{__('Block')}}
                    </span><!--end::Label-->
                </div><!--end::Info-->
            </div><!--end::Item-->
        </div>



        <!--begin::Top 3 Users-->
        <div class="separator separator-dotted separator-content my-15">
            <span class="w-250px h3">{{__('Top 3 Users')}}</span>
        </div>
        <!--end::Top 3 Users-->

        <!--begin::Row-->
        <div class="row g-5 g-xl-8">

            @foreach($topAdmins as $admin)
                <div class="col-xl-4">
                    <!--begin::Statistics Widget 2-->
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body d-flex align-items-center pt-3 pb-0">
                            <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                                <div class="fw-bold text-dark fs-4 mb-2">{{$admin->full_name}}</div>

                                <span class="fw-semibold text-muted fs-2x" data-kt-countup="true" data-kt-countup-value="{{$admin->bugs_count}}">0</span>
                            </div>
                            <img src="{{getImageUserPath($admin->image, 'Admins')}}" alt="" class="align-self-end h-100px symbol symbol-30px" />
                        </div><!--end::Body-->
                    </div><!--end::Statistics Widget 2-->
                </div>
            @endforeach
        </div><!--end::Row-->

        <!--begin::Top 3 Users-->
        <div class="separator separator-dotted separator-content my-15">
            <span class="w-250px h3">{{__('Quick stats')}}</span>
        </div>
        <!--end::Top 3 Users-->

        <!--begin::Row-->
        <div class="row g-5 g-xl-8">
            <div class="col-xl-3">
                <!--begin::Statistics Widget 5-->
                <a href="{{route('dashboard.admins.index')}}" class="card bg-success hoverable card-xl-stretch mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Svg Icon-->
                        <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4" d="M9 2C6.38 2 4.25 4.13 4.25 6.75C4.25 9.32 6.26 11.4 8.88 11.49C8.96 11.48 9.04 11.48 9.1 11.49C9.12 11.49 9.13 11.49 9.15 11.49C9.16 11.49 9.16 11.49 9.17 11.49C11.73 11.4 13.74 9.32 13.75 6.75C13.75 4.13 11.62 2 9 2Z" fill="white"/>
                            <path d="M14.08 14.1499C11.29 12.2899 6.73996 12.2899 3.92996 14.1499C2.65996 14.9999 1.95996 16.1499 1.95996 17.3799C1.95996 18.6099 2.65996 19.7499 3.91996 20.5899C5.31996 21.5299 7.15996 21.9999 8.99996 21.9999C10.84 21.9999 12.68 21.5299 14.08 20.5899C15.34 19.7399 16.04 18.5999 16.04 17.3599C16.03 16.1299 15.34 14.9899 14.08 14.1499Z" fill="white"/>
                            <path opacity="0.4" d="M19.9899 7.3401C20.1499 9.2801 18.7699 10.9801 16.8599 11.2101C16.8499 11.2101 16.8499 11.2101 16.8399 11.2101H16.8099C16.7499 11.2101 16.6899 11.2101 16.6399 11.2301C15.6699 11.2801 14.7799 10.9701 14.1099 10.4001C15.1399 9.4801 15.7299 8.1001 15.6099 6.6001C15.5399 5.7901 15.2599 5.0501 14.8399 4.4201C15.2199 4.2301 15.6599 4.1101 16.1099 4.0701C18.0699 3.9001 19.8199 5.3601 19.9899 7.3401Z" fill="white"/>
                            <path d="M21.9902 16.5899C21.9102 17.5599 21.2902 18.3999 20.2502 18.9699C19.2502 19.5199 17.9902 19.7799 16.7402 19.7499C17.4602 19.0999 17.8802 18.2899 17.9602 17.4299C18.0602 16.1899 17.4702 14.9999 16.2902 14.0499C15.6202 13.5199 14.8402 13.0999 13.9902 12.7899C16.2002 12.1499 18.9802 12.5799 20.6902 13.9599C21.6102 14.6999 22.0802 15.6299 21.9902 16.5899Z" fill="white"/>
                        </svg>
                    </span><!--end::Svg Icon-->

                        <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">{{$countAdmins}}</div>
                        <div class="fw-semibold text-gray-100">{{__('Admins')}}</div>
                    </div><!--end::Body-->
                </a><!--end::Statistics Widget 5-->
            </div>


            <div class="col-xl-2">
                <!--begin::Statistics Widget 5-->
                <a href="{{route('dashboard.bugs.index')}}" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                        <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
                            <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor" />
                            <rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
                            <rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
                        </svg>
                    </span><!--end::Svg Icon-->

                        <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">{{$countBugs}}</div>
                        <div class="fw-semibold text-gray-100">{{__('Bugs')}}</div>
                    </div><!--end::Body-->
                </a><!--end::Statistics Widget 5-->
            </div>

            <div class="col-xl-2">
                <!--begin::Statistics Widget 5-->
                <a href="{{route('dashboard.projects.index')}}" class="card bg-secondary hoverable card-xl-stretch mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                        <span class="svg-icon svg-icon-dark svg-icon-3x ms-n1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="currentColor" />
                            <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="currentColor" />
                        </svg>
                    </span>
                        <!--end::Svg Icon-->
                        <div class="text-gray-600 fw-bold fs-2 mb-2 mt-5">{{$countProjects}}</div>
                        <div class="fw-semibold text-gray-600">{{__('Projects')}}</div>
                    </div>
                    <!--end::Body-->
                </a>
                <!--end::Statistics Widget 5-->
            </div>

            <div class="col-xl-2">
                <!--begin::Statistics Widget 5-->
                <a href="{{route('dashboard.awards.index')}}" class="card bg-danger hoverable card-xl-stretch mb-5 mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra007.svg-->
                        <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4" d="M19 9C19 10.45 18.57 11.78 17.83 12.89C16.75 14.49 15.04 15.62 13.05 15.91C12.71 15.97 12.36 16 12 16C11.64 16 11.29 15.97 10.95 15.91C8.96 15.62 7.25 14.49 6.17 12.89C5.43 11.78 5 10.45 5 9C5 5.13 8.13 2 12 2C15.87 2 19 5.13 19 9Z" fill="white"/>
                            <path d="M21.25 18.4699L19.6 18.8599C19.23 18.9499 18.94 19.2299 18.86 19.5999L18.51 21.0699C18.32 21.8699 17.3 22.1099 16.77 21.4799L12 15.9999L7.22996 21.4899C6.69996 22.1199 5.67996 21.8799 5.48996 21.0799L5.13996 19.6099C5.04996 19.2399 4.75996 18.9499 4.39996 18.8699L2.74996 18.4799C1.98996 18.2999 1.71996 17.3499 2.26996 16.7999L6.16996 12.8999C7.24996 14.4999 8.95996 15.6299 10.95 15.9199C11.29 15.9799 11.64 16.0099 12 16.0099C12.36 16.0099 12.71 15.9799 13.05 15.9199C15.04 15.6299 16.75 14.4999 17.83 12.8999L21.73 16.7999C22.28 17.3399 22.01 18.2899 21.25 18.4699Z" fill="white"/>
                            <path d="M12.58 5.98L13.17 7.15999C13.25 7.31999 13.46 7.48 13.65 7.51L14.72 7.68999C15.4 7.79999 15.56 8.3 15.07 8.79L14.24 9.61998C14.1 9.75998 14.02 10.03 14.07 10.23L14.31 11.26C14.5 12.07 14.07 12.39 13.35 11.96L12.35 11.37C12.17 11.26 11.87 11.26 11.69 11.37L10.69 11.96C9.96997 12.38 9.53997 12.07 9.72997 11.26L9.96997 10.23C10.01 10.04 9.93997 9.75998 9.79997 9.61998L8.96997 8.79C8.47997 8.3 8.63997 7.80999 9.31997 7.68999L10.39 7.51C10.57 7.48 10.78 7.31999 10.86 7.15999L11.45 5.98C11.74 5.34 12.26 5.34 12.58 5.98Z" fill="white"/>
                       </svg>

                    </span>
                        <!--end::Svg Icon-->
                        <div class="text-white fw-bold fs-2 mb-2 mt-5">{{$countAwards}}</div>
                        <div class="fw-semibold text-white">{{__('Awards')}}</div>
                    </div>
                    <!--end::Body-->
                </a>
                <!--end::Statistics Widget 5-->
            </div>

            <div class="col-xl-3">
                <!--begin::Statistics Widget 5-->
                <a href="{{route('dashboard.statuses.index')}}" class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra007.svg-->
                        <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.19995 14.02C3.12995 18.58 7.15995 22 12 22C16.82 22 20.8399 18.59 21.7899 14.05" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.48996 3.07007C4.80996 4.43007 2.81996 6.96007 2.20996 9.98007" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M21.81 10.06C20.91 5.46 16.86 2 12 2" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 13.5C12.8284 13.5 13.5 12.8284 13.5 12C13.5 11.1716 12.8284 10.5 12 10.5C11.1716 10.5 10.5 11.1716 10.5 12C10.5 12.8284 11.1716 13.5 12 13.5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>


                    </span>
                        <!--end::Svg Icon-->
                        <div class="text-white fw-bold fs-2 mb-2 mt-5">{{$countStatuses}}</div>
                        <div class="fw-semibold text-white">{{__('Statuses')}}</div>
                    </div>
                    <!--end::Body-->
                </a>
                <!--end::Statistics Widget 5-->
            </div>


        </div>
        <!--end::Row-->


        <!--begin::Detailed statistics-->
        <div class="separator separator-dotted separator-content my-15">
            <span class="w-250px h3">{{__('Detailed statistics')}}</span>
        </div><!--end::Detailed statistics-->

        <!--begin::Row-->
        <div class="row g-5 g-xl-8">

            <div class="col-xl-4">
                <!--begin::List Widget 1-->
                <div class="card card-xl-stretch mb-5 mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-dark">{{__('Top 5 Projects')}}</span>
                            <span class="text-muted mt-1 fw-semibold fs-7">{{__('Most projects have bugs')}}</span>
                        </h3>
                    </div><!--end::Header-->

                    <!--begin::Body-->
                    <div class="card-body pt-5">

                        @forelse($topProjects as $project)
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-8">
                                <!--begin::Description-->
                                <div class="flex-grow-1">
                                    <a href="{{route('dashboard.projects.show', $project->id)}}" class="text-gray-800 text-hover-primary fw-bold fs-6">{{$project->title}}</a>
                                    <span class="text-muted fw-semibold d-block">{!! Str::limit($project->description,'50') !!}</span>
                                </div><!--end::Description-->
                                <span class="badge badge-light-success fs-8 fw-bold">{{$project->bugs_count}}</span>
                            </div><!--end::Item-->
                        @empty
                        @endforelse
                    </div><!--end::Body-->
                </div><!--end::List Widget 1-->
            </div>


            <div class="col-xl-4">
                <!--begin::List Widget 2-->
                <div class="card card-xl-stretch mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0">
                        <h3 class="card-title fw-bold text-dark">{{__('Assigned users bugs')}}</h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-2">
                        @forelse($topUsers as $user)
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-8">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px me-5">
                                    <img src="{{getImageUserPath($user->immage, 'Users')}}" class="" alt="" />
                                </div><!--end::Avatar-->

                                <!--begin::Text-->
                                <div class="flex-grow-1">
                                    <div class="text-dark fw-bold fs-6">{{$user->full_name}}</div>
                                    <span class="text-muted d-block fw-bold">{{$user->email}}</span>
                                </div><!--end::Text-->
                                <span class="badge badge-light-success fs-8 fw-bold">{{$user->bugs_responsible_admin_count}}</span>
                            </div>
                            <!--end::Item-->

                        @empty
                        @endforelse

                    </div>
                    <!--end::Body-->
                </div>
                <!--end::List Widget 2-->
            </div>


            <div class="col-xl-4">
                <!--begin::List Widget 3-->
                <div class="card card-xl-stretch mb-5 mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0">
                        <h3 class="card-title fw-bold text-dark">{{__('Top 5 Statuses')}}</h3>
                    </div><!--end::Header-->

                    <!--begin::Body-->
                    <div class="card-body pt-2">

                        @forelse($topStatus as $status)
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-8">
                                <!--begin::Description-->
                                <div class="flex-grow-1">
                                    <div class="text-gray-800 fw-bold fs-6">{{$status->title}}</div>
                                    @if($status->is_default == 1)
                                        <span class="text-success fw-semibold d-block"> {{__('Default')}}</span>
                                    @else
                                        <span class="text-danger fw-semibold d-block"> {{__('Not the default')}}</span>
                                    @endif
                                </div><!--end::Description-->
                                <span class="badge badge-light-success fs-8 fw-bold">{{$status->bugs_count}}</span>
                            </div><!--end:Item-->
                        @empty

                        @endforelse
                    </div><!--end::Body-->
                </div><!--end:List Widget 3-->
            </div>
        </div><!--end::Row-->
    @endif
@endsection
