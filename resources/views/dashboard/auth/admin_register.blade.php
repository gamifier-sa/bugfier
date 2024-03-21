@push('styles')
    <link href="{{ asset('dashboard-assets/css/Signin.css') }}" rel="stylesheet" type="text/css" />
@endpush


@extends('dashboard.auth.layouts.master')
@section('title')
    {{ __('Sign up') }}
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
            src="{{ asset('dashboard-assets/media/auth/signup-avatar.png') }}" alt="" />
        <img class="theme-dark-show mx-auto w-100   mb-10 mb-lg-20"
            src="{{ asset('dashboard-assets/media/auth/signup-avatar-dark.png') }}" alt="" />
    </div>
    <!--end::Image-->
@endsection


@section('content')
    <!--begin::Body-->
    <div class="d-flex flex-column-fluid flex-lg-row-auto right justify-content-center justify-content-lg-end p-12">
        <!--begin::Wrapper-->
        <div class=" d-flex flex-center w-100 p-0 pt-0 p-sm-10">
            <!--begin::Content-->
            <div class="w-100">
                <!--begin::Form-->
                <!--begin::Form-->
                <form class="form  w-100" style="margin-bottom: 150px"
                    data-success-message="{{ __('Successfully Registered') }}"
                    data-redirection-url="{{ route('pending.register') }}" id="submitted-form"
                    action="{{ route('admin.register') }}" method="POST">
                    @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">{{ __('Welcome') }}</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <div class="d-flex flex-md-row flex-column justify-content-between gap-10 ">
                        <!--begin::Input group for Name (Arabic)-->
                        <div class="fv-row col-md-5  mb-10">
                            <!--begin::Label-->
                            <label for="name_ar" class="form-label">{{ __('Name Arabic') }}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control bg-transparent" type="text" name="name_ar"
                                placeholder="{{ __('Enter the name in Arabic') }}" required autocomplete="off" />
                            <p class="invalid-feedback" id="name_ar"></p><!--end::Input-->
                        </div>
                        <!--end::Input group for Name (Arabic)-->

                        <!--begin::Input group for Name (English)-->
                        <div class="fv-row col-md-5 mb-10">
                            <!--begin::Label-->
                            <label for="name_en" class="form-label">{{ __('Name English') }}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control bg-transparent" type="text" name="name_en"
                                placeholder="{{ __('Enter the name in English') }}" required autocomplete="off" />
                            <p class="invalid-feedback" id="name_en"></p><!--end::Input-->
                        </div>
                        <!--end::Input group for Name (English)-->
                    </div>


                    <!--begin::Input group for Email-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="input-group">
                            <input class="form-control bg-transparent" type="email" name="email"
                                placeholder="{{ __('Enter the email') }}" autocomplete="off" />
                            <span class="input-group-text">
                                <!-- Email SVG Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path
                                        d="M1.473 2.52A2 2 0 0 1 2 2h12a2 2 0 0 1 .527.072L8 7.773 1.473 2.52zM0 3.847v8.291A2.998 2.998 0 0 0 2 15h12a3 3 0 0 0 2.998-2.847V3.847A2.998 2.998 0 0 0 14 1H2a3 3 0 0 0-2.998 2.847z" />
                                </svg>
                            </span>
                        </div>
                        <p class="invalid-feedback" id="email"></p><!--end::Input-->
                    </div>
                    <!--end::Input group for Email-->

                    <!--begin::Input group for Password-->
                    <div class="fv-row mb-8" data-kt-password-meter="true">
                        <!--begin::Label-->
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <!--end::Label-->
                        <!--begin::Wrapper-->
                        <div class="mb-1">
                            <!--begin::Input wrapper-->
                            <div class="position-relative mb-3">
                                <input class="form-control bg-transparent" type="password"
                                    placeholder="{{ __('Password') }}" name="password" autocomplete="off" />
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                    data-kt-password-meter-control="visibility">
                                    <i class="bi bi-eye-slash fs-2"></i>
                                    <i class="bi bi-eye fs-2 d-none"></i>
                                </span>
                                <p class="invalid-feedback" id="password"></p>
                            </div>
                            <!--end::Input wrapper-->
                            <!--begin::Meter-->
                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>
                            <!--end::Meter-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Hint-->
                        <div class="text-muted">
                            {{ __('Use 8 or more characters with a mix of letters, numbers & symbols.') }}</div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Input group for Password-->
                    <div class="d-flex justify-content-between ">
                        <div class="form-check form-check-sm text-light form-check-custom form-check-solid">
                            <input class="form-check-input me-1" type="checkbox" name="remember"
                                value="1">{{ __('Remember me') }}
                        </div>



                        <!--begin::Submit button-->

                        <button type="submit" id="submit-btn" class="btn sign-btn mb-5" data-kt-indicator="">
                            <span class="indicator-label">
                                {{ __('Sign up') }}
                            </span>
                            <span class="indicator-progress">
                                {{ __('Please wait ...') }} <span
                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>

                        <!--end::Submit button-->

                    </div>
                    <!--begin::Actions-->
                    <div class="text-center">
                        <!--begin::Submit button-->

                        <!--end::Submit button-->

                        <!--begin::Sign up-->
                        <div class="text-gray-400 text-center fw-semibold fs-6">{{ __('Already have an Account?') }}
                            <a href="{{ route('login-form') }}" class="link-light">{{ __('Login') }}</a>
                        </div>
                        <!--end::Sign up-->
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->

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
    <script src="{{ asset('dashboard-assets/js/custom/authentication/sign-up/general.js') }}"></script>
@endpush
