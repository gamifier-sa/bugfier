@extends('dashboard.layouts.master')
@section('title') {{__("Edit"). ' - '. $user->name}} @endsection
@section('content')

    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.users.index') }}" class="text-muted text-hover-primary">{{ __("Admins") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Edit An Admins')}}</li><!-- end   :: Item -->
    @endcomponent

    <div class="card  mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="card-body">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.users.update', $user->id) }}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.users.index') }}">
                @csrf
                @method('PUT')
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <h3 class="fw-bolder text-dark">{{ __("Edit An Admins")}}</h3>
                </div><!-- end   :: Card header -->

                    <!-- begin :: Inputs wrapper -->
                    <div class="inputs-wrapper">
                    @include('dashboard.users.form')

                    <!-- begin :: Row -->
                        <div class="row mb-8">

                            <!-- begin :: Column -->
                            <div class="col-md-6 fv-row">

                                <label class="fs-5 fw-bold mb-2">{{ __("Password") }} <span class="text-danger">*</span></label>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password_inp" name="password" autocomplete="off"/>
                                    <label for="password_inp">{{ __("Enter the password") }}</label>
                                </div>
                                <p class="invalid-feedback" id="password" ></p>
                            </div><!-- end   :: Column -->

                            <!-- begin :: Column -->
                            <div class="col-md-6 fv-row">

                                <label class="fs-5 fw-bold mb-2">{{ __("Password Confirmation") }} <span class="text-danger">*</span></label>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password_confirmation_inp" name="password_confirmation" autocomplete="off"/>
                                    <label for="password_confirmation_inp">{{ __("Enter the password confirmation") }}</label>
                                </div>
                                <p class="invalid-feedback" id="password_confirmation" ></p>
                            </div><!-- end   :: Column -->
                        </div><!-- end   :: Row -->

                    </div><!-- end   :: Inputs wrapper -->
                <!-- begin :: Form footer -->
                <div class="form-footer">

                    <!-- begin :: Submit btn -->
                    <button type="submit" class="btn btn-primary" id="submit-btn">

                        <span class="indicator-label">{{ __("Save") }}</span>

                        <!-- begin :: Indicator -->
                        <span class="indicator-progress">{{ __("Please wait ...") }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span><!-- end   :: Indicator -->
                    </button><!-- end   :: Submit btn -->

                    <a class="btn btn-secondary" href="{{ route('dashboard.users.index')}}"> {{__("Cancel")}} </a>
                </div><!-- end   :: Form footer -->
            </form><!-- end   :: Form -->
        </div><!-- end   :: Card body -->
    </div>

@endsection
