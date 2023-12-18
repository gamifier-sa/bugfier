@extends('partials.dashboard.master')
@section('title') {{ __("Show") . ' - ' . $employee->name_ar  }} @endsection

@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.employees.index') }}" class="text-muted text-hover-primary">{{ __("Employees") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Employee data')}}</li><!-- end   :: Item -->
    @endcomponent

    <div class="card  mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="card-body ">
            <!-- begin :: Form -->
            <form  class="form" >
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <h3 class="fw-bolder text-dark">{{ __("Employee data")}}</h3>
                </div><!-- end   :: Card header -->

                <!-- begin :: Row -->
                <div class="row mb-8 p-5">

                    <!-- begin :: Column -->
                    <div class="col-md-6 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Name arabic") }} <span class="text-danger">*</span></label>
                        <div class="form-floating">
                            <input type="text" class="form-control gui-input" id="name_ar_inp"  value="{{old('name_ar', $employee->name_ar)}}" readonly/>
                            <label for="name_ar_inp">{{ __("Enter the name in arabic") }}</label>
                        </div>
                        <p class="invalid-feedback" id="name_ar" ></p>
                    </div><!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-6 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Name english") }}</label>
                        <div class="form-floating">
                            <input type="text" class="form-control en-input" id="name_en_inp" value="{{old('name_en', $employee->name_en)}}" readonly/>
                            <label for="name_en_inp">{{ __("Enter the name in english") }}</label>
                        </div>
                        <p class="invalid-feedback" id="name_en" ></p>
                    </div><!-- end   :: Column -->
                </div><!-- end   :: Row -->

                <!-- begin :: Row -->
                <div class="row mb-8 p-5">

                    <!-- begin :: Column -->
                    <div class="col-md-6 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Email") }} <span class="text-danger">*</span></label>
                        <div class="form-floating">
                            <input type="email" class="form-control" id="email_inp" value="{{old('email', $employee->email)}}" readonly/>
                            <label for="email_inp">{{ __("Enter the email") }}</label>
                        </div>
                        <p class="invalid-feedback" id="email" ></p>
                    </div><!-- end   :: Column -->


                    <!-- begin :: Column -->
                    <div class="col-md-6 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Phone") }} <span class="text-danger">*</span></label>
                        <div class="form-floating">
                            <input type="tel" class="form-control" id="phone_inp" value="{{old('phone', $employee->phone)}}" readonly/>
                            <label for="phone_inp">{{ __("Enter the phone") }}</label>
                        </div>
                        <p class="invalid-feedback" id="phone" ></p>
                    </div><!-- end   :: Column -->
                </div><!-- end   :: Row -->

                <div class="row mb-8">
                    <!-- begin :: Column -->
                    <div class="col-md-12 fv-row">

                        <label class="fs-5 fw-bold mb-2" for="roles-sp">{{ __("Roles") }} <span class="text-danger">*</span></label>
                        <select class="form-select" data-control="select2" multiple id="roles-sp" disabled data-placeholder="{{ __("Choose the roles") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                            @foreach( $roles as $role)
                                <option {{ old('roles') && in_array($role->id, old('roles')) ? 'selected' : (in_array($role->id, $employee->roles->pluck('id')->toArray()) ? 'selected' : '') }} value="{{ $role->id }}"> {{ $role->name }} </option>
                            @endforeach
                        </select>
                        <p class="invalid-feedback" id="roles-sp" ></p>
                    </div><!-- end   :: Column -->
                </div><!-- end   :: Row -->


                <!-- begin :: Form footer -->
                <div class="form-footer">
                    <!-- begin :: Submit btn -->
                    <a href="{{ route('dashboard.employees.index') }}" class="btn btn-primary" >
                        <span class="indicator-label">{{ __("Back") }}</span>
                    </a><!-- end   :: Submit btn -->
                </div><!-- end   :: Form footer -->
            </form><!-- end   :: Form -->
        </div><!-- end   :: Card body -->
    </div>
@endsection
