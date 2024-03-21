@push('styles')
    <link href="{{ asset('dashboard-assets/css/Signin.css') }}" rel="stylesheet" type="text/css" />
@endpush

@extends('dashboard.auth.layouts.master')
@section('title')
    {{ __('Login') }}
@endsection
@section('images')
    <!--begin::Image-->


    <img class=" my-image" src="{{ asset('dashboard-assets/media/auth/OBJECTS.jpg') }}" alt="" />
    <div class="overlay-img"></div>
    <div class="my-left-insect">
        <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
            src="{{ asset('dashboard-assets/media/auth/LEFT-light.png') }}" alt="" />
        <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
            src="{{ asset('dashboard-assets/media/auth/LEFT-dark.png') }}" alt="" />

    </div>

    <h1 class="title px-20">
        Let's catch
        the bugs
    </h1>
    <div class="my-avatar w-100 px-20">
        <img class="theme-light-show mx-auto w-100   mb-10 mb-lg-20"
            src="{{ asset('dashboard-assets/media/auth/login-avatar.png') }}" alt="" />
        <img class="theme-dark-show mx-auto w-100   mb-10 mb-lg-20"
            src="{{ asset('dashboard-assets/media/auth/login-avatar-dark.png') }}" alt="" />
    </div>
    <!--end::Image-->
@endsection
@section('content')
    <!--begin::Body-->
    <div class="d-flex flex-column-fluid flex-lg-row-auto w-50 right justify-content-center justify-content-lg-end p-12">
        <!--begin::Wrapper-->
        <div class=" d-flex flex-center  w-100 p-0 pt-0 p-sm-10">
            <!--begin::Content-->
            <div class="w-100">
                <!--begin::Form-->
                <form class="form w-100" data-success-message="{{ __('Signed in successfully') }}"
                    data-redirection-url="{{ str_contains('/dashboard', URL::previous()) ? URL::previous() : '/dashboard' }}"
                    id="submitted-form" action="{{ route('admin.login') }}" method="POST">
                    @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="mb-3">{{ __('Welcome back') }}</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group for Email-->
                    <div class="fv-row mb-10">
                        <!--begin::Label for Email-->
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <!--end::Label-->
                        <!--begin::Input for Email-->
                        <div class="input-group">
                            <input class="form-control bg-transparent" type="email" name="email" id="email"
                                placeholder="{{ __('Your Email') }}" autocomplete="off" />
                            <!--begin::SVG Icon for Email-->
                            <div class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path
                                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                </svg>
                            </div>
                            <!--end::SVG Icon for Email-->
                        </div>
                        <p class="invalid-feedback" id="email"></p>
                        <!--end::Input for Email-->
                    </div>
                    <!--end::Input group for Email-->

                    <!--begin::Input group for Password-->
                    <div class="fv-row mb-10">
                        <!--begin::Label for Password-->
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <!--end::Label-->
                        <!--begin::Input for Password-->
                        <div class="d-flex align-items-center">
                            <input class="form-control bg-transparent" type="password" name="password"
                                placeholder="{{ __('Password') }}" autocomplete="off" id="password-field" />
                            <a onclick="showHidePass( 'password-field' , $(this) )" style="cursor: pointer">
                                <span class="fa fa-fw fa-eye fa-md toggle-password"
                                    @if (isArabic()) style="margin-right:-30px" @else style="margin-left:-30px" @endif></span>
                            </a>
                        </div>
                        <p class="invalid-feedback" id="password"></p>
                        <!--end::Input for Password-->
                    </div>
                    <!--end::Input group for Password-->

                    <!-- ... (other form elements) ... -->
                    <div class="d-flex justify-content-between ">
                        <div class="form-check form-check-sm text-light form-check-custom form-check-solid">
                            <input class="form-check-input me-1" type="checkbox" name="remember"
                                value="1">{{ __('Remember me') }}
                        </div>



                        <!--begin::Submit button-->

                        <button type="submit" id="submit-btn" class="btn sign-btn mb-5" data-kt-indicator="">
                            <span class="indicator-label">
                                {{ __('Sign In') }}
                            </span>

                            <span class="indicator-progress">
                                {{ __('Please wait ...') }} <span
                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>

                        </button>
                        <!--end::Submit button-->

                    </div>
                    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                        <div></div>
                        <!--begin::Link-->
                        {{--                        <a href="javascript:" class="link-primary">{{__('Forgot Password ?')}}</a> --}}
                        <!--end::Link-->
                    </div><!--end::Input group-->

                    <!--begin::Actions-->
                    <div class="text-center">

                        <!--begin::Sign up-->
                        <div class="text-gray-400 text-center fw-semibold fs-6">{{ __('Not a Member yet?') }}
                            <a href="{{ route('register-form') }}" class="link-light">{{ __('Sign up') }}</a>
                        </div>
                        <!--end::Sign up-->
                    </div>
                    <!--end::Actions-->
                </form>


                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->

        <div class="my-right-insect">
            <img class="theme-light-show mx-auto mw-100 w-150px w-lg-250px "
                src="{{ asset('dashboard-assets/media/auth/RIGHT-light.png') }}" alt="" />
            <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-250px "
                src="{{ asset('dashboard-assets/media/auth/RIGHT-dark.png') }}" alt="" />

        </div>

    </div>
    <!--end::Body-->
@endsection


@push('scripts')
    <link href="{{ asset('dashboard-assets/css/Signin.css') }}" rel="stylesheet" type="text/css" />
@endpush
