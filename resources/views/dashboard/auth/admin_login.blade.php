@extends('dashboard.auth.layouts.master')
@section('title')
    {{__('Login')}}
@endsection

@section('images')
    <!--begin::Image-->
    <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{asset('dashboard-assets/media/auth/agency.png')}}" alt="" />
    <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{asset('dashboard-assets/media/auth/agency-dark.png')}}" alt="" />
    <!--end::Image-->
@endsection

@section('content')
    <!--begin::Body-->
    <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
        <!--begin::Wrapper-->
        <div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
            <!--begin::Content-->
            <div class="w-md-400px">
                <!--begin::Form-->
                <form class="form w-100" data-success-message="{{ __("Signed in successfully") }}" data-redirection-url="{{ str_contains('/dashboard', URL::previous()) ? URL::previous() : '/dashboard' }}" id="submitted-form" action="{{ route('admin.login') }}" method="POST">
                @csrf
                <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">{{ __('Sign In to Bugfire') }}</h1>
                        <!--end::Title-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Input-->
                        <input class="form-control bg-transparent" type="email" name="email" placeholder="{{ __('Email') }}" autocomplete="off" />
                        <p class="invalid-feedback" id="email"></p>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Input-->
                        <div class="d-flex align-items-center" >
                            <input class="form-control bg-transparent" type="password" name="password" placeholder="{{__('Password')}}" autocomplete="off" id="password-field" />
                            <a onclick="showHidePass( 'password-field' , $(this) )" style="cursor: pointer">
                                <span class="fa fa-fw fa-eye fa-md toggle-password"  @if( isArabic() )  style="margin-right:-30px" @else style="margin-left:-30px" @endif></span>
                            </a>
                        </div>
                        <p class="invalid-feedback" id="password"></p>
                        <!--end::Input-->
                    </div>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="remember" value="1">{{__('Remember me')}}
                    </div>
                    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                        <div></div>
                        <!--begin::Link-->
{{--                        <a href="javascript:" class="link-primary">{{__('Forgot Password ?')}}</a>--}}
                        <!--end::Link-->
                    </div><!--end::Input group-->

                    <!--begin::Actions-->
                    <div class="text-center">
                        <!--begin::Submit button-->

                        <button type="submit" id="submit-btn" class="btn btn-lg btn-primary w-100 mb-5" data-kt-indicator="">
                            <span class="indicator-label">
                                {{ __('Sign In') }}
                            </span>

                            <span class="indicator-progress">
                                {{ __('Please wait ...') }} <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>

                        </button>
                        <!--end::Submit button-->
                        <!--begin::Sign up-->
                        <div class="text-gray-500 text-center fw-semibold fs-6">{{__('Not a Member yet?')}}
                            <a href="{{route('register-form')}}" class="link-primary">{{__('Sign up')}}</a>
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
