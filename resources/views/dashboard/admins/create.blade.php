@extends('dashboard.layouts.master')
@inject('admin','App\Models\Admin')
@section('title') {{__("add new admin")}} @endsection
@push('styles')
    <style>
        #togglePasswordVisibility {
            cursor: pointer;
            color: #6c757d;
            /* Adjust the color as needed */
            text-decoration: none;
        }
    </style>
@endpush
@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.admins.index') }}" class="text-muted text-hover-primary">{{ __("Admins") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Add New Admin')}}</li><!-- end   :: Item -->
    @endcomponent

    <div class="card mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="card-body">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.admins.store') }}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.admins.index') }}" autocomplete="off">
                @csrf
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <h3 class="fw-bolder text-dark">{{ __("add new admin") }}</h3>
                </div><!-- end   :: Card header -->
                    <!-- begin :: Inputs wrapper -->
                    <div class="inputs-wrapper">
                        @include('dashboard.admins.form')

                        <!-- begin :: Row -->
                        <div class="row mb-8 p-5">

                            <!-- begin :: Column -->
                            <div class="col-md-6 fv-row">

                                <label class="fs-5 fw-bold mb-2 required">{{ __("Password") }}</label>
                                <div class="form-floating position-relative">
                                    <input type="password" class="form-control" id="password_inp" name="password" required autocomplete="off" />
                                    <label for="password_inp">{{ __("Enter the password") }}</label>
                                    <a id="togglePasswordVisibility" class="position-absolute top-50 translate-middle-y end-0 "
                                       style="margin-right: 10px">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                                <p class="invalid-feedback" id="password" ></p>
                            </div><!-- end   :: Column -->

                            <!-- begin :: Column -->


                            <div class="col-md-6 fv-row">

                                <label class="fs-5 fw-bold mb-2 required">{{ __("Password confirmation") }}</label>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password_confirmation_inp" name="password_confirmation" required autocomplete="off" />
                                    <label for="password_confirmation_inp">{{ __("Enter the password confirmation") }}</label>
                                </div>
                                <p class="invalid-feedback" id="password_confirmation" ></p>
                            </div><!-- end   :: Column -->
                        </div><!-- end   :: Row -->

                              <!-- begin :: Row -->
                            <div class="row mb-8 p-5">
                                <!-- begin :: Column -->
                                <div class="col-md-6 fv-row">

                                    <label class="fs-5 fw-bold mb-2" for="roles-sp">{{ __("Roles") }} <span class="text-danger">*</span></label>
                                    <select class="form-select" data-control="select2" name="roles[]" required multiple id="roles-sp" data-placeholder="{{ __("Choose the roles") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                        @foreach( $roles as $role)
                                            <option {{ old('roles') && in_array($role->id, old('roles')) ? 'selected' : (in_array($role->id, $admin->roles->pluck('id')->toArray()) ? 'selected' : '') }} value="{{ $role->id }}"> {{ $role->name }} </option>
                                        @endforeach
                                    </select>
                                    <p class="invalid-feedback" id="roles-sp" ></p>
                                </div><!-- end   :: Column -->
                            </div><!-- end   :: Row -->
                    </div><!-- end   :: Inputs wrapper -->

                <!-- begin :: Form footer -->
                <div class="form-footer">
                    <!-- begin :: Submit btn -->
                    <button type="submit" class="btn btn-primary" id="submit-btn" onClick="reload">
                        <span class="indicator-label">{{ __("Save") }}</span>
                        <!-- begin :: Indicator -->
                        <span class="indicator-progress">{{ __("Please wait ...") }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span><!-- end   :: Indicator -->
                    </button><!-- end   :: Submit btn -->

                    <a class="btn btn-secondary" href="{{ route('dashboard.admins.index')}}"> {{__("Cancel")}} </a>
                </div><!-- end   :: Form footer -->
            </form><!-- end   :: Form -->
        </div><!-- end   :: Card body -->
    </div>
@endsection

@push('scripts')

    <script>
        document.getElementById('togglePasswordVisibility').addEventListener('click', function () {
            togglePasswordVisibility('password_inp');
            togglePasswordVisibility('password_confirmation_inp');
        });

        function togglePasswordVisibility(inputId) {
            const passwordInput = document.getElementById(inputId);
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
        }
    </script>
@endpush
