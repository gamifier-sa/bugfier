@extends('dashboard.auth.layouts.master')
@section('title')
    {{__('Admin login')}}
@endsection
@section('content')
    <!--begin::Body-->
    <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
        <!--begin::Wrapper-->
        <div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
            <!--begin::Content-->
            <div class="w-md-400px">
                <!--begin::Form-->
                <form class="form w-100" data-success-message="{{ __("Successfully Registered") }}" data-redirection-url="{{route('pending.register')}}" id="submitted-form" action="{{route('admin.register')}}" method="POST">
                    @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">{{ __('Sign Up to Bugfire') }}</h1>
                        <!--end::Title-->
                    </div>
                    <!--begin::Heading-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Input-->
                        <input class="form-control bg-transparent" type="text" name="name_ar" placeholder="{{__('Enter the name in arabic')}}" required autocomplete="off" />
                        <p class="invalid-feedback" id="name_ar"></p><!--end::Input-->
                    </div>
                    <!--end::Input group-->


                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Input-->
                        <input class="form-control bg-transparent" type="text" name="name_en" placeholder="{{__('Enter the name in english')}}" required autocomplete="off" />
                        <p class="invalid-feedback" id="name_en"></p><!--end::Input-->
                    </div>


                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Input-->
                        <input class="form-control bg-transparent" type="email" name="email" placeholder="{{__('Enter the email')}}" autocomplete="off" />
                        <p class="invalid-feedback" id="email"></p><!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-8" data-kt-password-meter="true">
                        <!--begin::Wrapper-->
                        <div class="mb-1">
                            <!--begin::Input wrapper-->
                            <div class="position-relative mb-3">
                                <input class="form-control bg-transparent" type="password" placeholder="{{__('Password')}}" name="password" autocomplete="off" />
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                    <i class="bi bi-eye-slash fs-2"></i>
                                    <i class="bi bi-eye fs-2 d-none"></i>
                                </span>
                                <p class="invalid-feedback" id="email"></p>
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
                        <div class="text-muted">{{__('Use 8 or more characters with a mix of letters, numbers & symbols.')}}</div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Input group=-->
                    <!--end::Input group=-->
                    <div class="fv-row mb-8">
                        <!--begin::Repeat Password-->
                        <input placeholder="{{__('Password confirmation')}}" name="password_confirmation" type="password" autocomplete="off" class="form-control bg-transparent" />
                        <!--end::Repeat Password-->
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <!--begin::Submit button-->

                        <button type="submit" id="submit-btn" class="btn btn-lg btn-primary w-100 mb-5" data-kt-indicator="">
                                <span class="indicator-label">
                                    {{ __('Sign up') }}
                                </span>

                            <span class="indicator-progress">
                                {{ __('Please wait ...') }} <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>

                        </button>
                        <!--end::Submit button-->

                        <!--begin::Sign up-->
                        <div class="text-gray-500 text-center fw-semibold fs-6">{{__('Already have an Account?')}}
                            <a href="{{route('login-form')}}" class="link-primary">{{__('Login')}}</a>
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
    </div>
    <!--end::Body-->
@endsection
@push('scripts')
    <script src="{{asset('dashboard-assets/js/custom/authentication/sign-up/general.js')}}"></script>
@endpush
