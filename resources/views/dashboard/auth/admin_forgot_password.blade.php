<!DOCTYPE html>
<html lang="{{ getLocale() }}" direction="{{ isArabic() ? 'rtl' : 'ltr' }}" style="direction:{{ getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<!--begin::Head-->
<head><base href="../../../">
    <title>{{ __('tempelet - Dashboard') }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <link rel="shortcut icon" href="{{asset('favicon.png')}}" />

    <!--begin::Fonts-->
    @if ( isArabic() )
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @else
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;900&display=swap" rel="stylesheet">
    @endif
    <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('dashboard-assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{  asset('dashboard-assets/css/style'  . '.bundle' . ( isArabic() ? '.rtl' : '' ) . '.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <style>

    </style>
</head>
<!--end::Head-->
<!--begin::Body-->
<body class="bg-dark">

<div class="d-flex flex-column flex-root">
    <!--begin::Page bg image-->
    <style>body { background-image: url('{{ asset("dashboard-assets/media/auth/bg10.jpeg") }}'); } [data-theme="dark"] body { background-image: url('{{asset('dashboard-assets/media/auth/bg10-dark.jpeg')}}'); }</style>
    <!--end::Page bg image-->
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Aside-->
        <div class="d-flex flex-lg-row-fluid">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                <!--begin::Image-->
                <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{ asset('dashboard-assets/media/auth/agency.png') }}" alt="" />
                <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{ asset('dashboard-assets/media/auth/agency-dark.png') }}" alt="" />
                <!--end::Image-->
                <!--begin::Title-->
                <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">Fast, Efficient and Productive</h1>
                <!--end::Title-->
                <!--begin::Text-->
                <div class="text-gray-600 fs-base text-center fw-semibold">In this kind of post,
                <a href="#" class="opacity-75-hover text-primary me-1">the blogger</a>introduces a person they’ve interviewed
                <br />and provides some background information about
                <a href="#" class="opacity-75-hover text-primary me-1">the interviewee</a>and their
                <br />work following this is a transcript of the interview.</div>
                <!--end::Text-->
            </div>
            <!--end::Content-->
        </div>
        <!--begin::Aside-->
        <!--begin::Body-->
        <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
            <!--begin::Wrapper-->
            <div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
                <!--begin::Content-->
                <div class="w-md-400px">
                    <!--begin::Form-->
                    <form class="form w-100" action="{{ route('employee.send-mail') }}" method="POST">
                        @csrf
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark fw-bolder mb-3">{{__("Forgot Password")}}</h1><!--end::Title-->

                            <!--begin::Link-->
                            <div class="text-gray-500 fw-semibold fs-6">{{__("Enter your email to reset your password")}}</div><!--end::Link-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group=-->
                        <div class="fv-row mb-8">
                            <!--begin::Email-->
                            <input type="text" placeholder="" value="{{old('email')}}" name="email" autocomplete="off" class="form-control bg-transparent @error('email') is-invalid @enderror" /><!--end::Email-->
                        </div>
                        @error('email')
                            <!--begin::Alert-->
                            <div class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row p-5 mb-10">
                                <!--begin::Icon-->
                                <i class="ki-duotone ki-notification-bing fs-2hx text-primary me-4 mb-5 mb-sm-0">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i><!--end::Icon-->

                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column pe-0 pe-sm-10">
                                    <!--begin::Content-->
                                    <span>
                                        {{$message}}
                                    </span><!--end::Content-->
                                </div><!--end::Wrapper-->
                            </div><!--end::Alert-->
                        @enderror

                        <!-- begin :: Form footer -->
                        <div class="form-footer">
                            <!-- begin :: Submit btn -->
                            <button type="submit" class="btn btn-primary" id="submit-btn">
                                <span class="indicator-label">{{ __("submit") }}</span>

                                <!-- begin :: Indicator -->
                                <span class="indicator-progress">{{ __("Please wait ...") }}
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span><!-- end   :: Indicator -->
                            </button><!-- end   :: Submit btn -->

                            <a class="btn btn-secondary" href="{{ route('employee.login')}}"> {{__("Cancel")}} </a>
                        </div><!-- end   :: Form footer -->
                    </form><!--end::Form-->
                </div><!--end::Content-->
            </div><!--end::Wrapper-->
        </div><!--end::Body-->
    </div><!--end::Authentication - Sign-in-->
</div>

<!--begin::Javascript-->
<script src="{{ asset('dashboard-assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('dashboard-assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('js/dashboard/translations.js') }}"></script>
<script src="{{ asset('js/dashboard/global_scripts.js') }}"></script>
<!--end::Javascript-->

</body>
<!--end::Body-->
</html>
