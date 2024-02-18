@extends('dashboard.layouts.master')
@inject('admin', 'App\Models\Admin')
@section('title')
    {{ __('add new admin') }}
@endsection
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
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.admins.index') }}"
                    class="text-muted text-hover-primary">{{ __('Admins') }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{ __('Add New Admin') }}</li><!-- end   :: Item -->
    @endcomponent

    <div class=" mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="mt-10">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.admins.store') }}" class="form" method="post" id="submitted-form"
                data-redirection-url="{{ route('dashboard.admins.index') }}" autocomplete="off">
                @csrf
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-centerv ">
                    <h3 class="fw-bolder text-dark ">{{ __('add new admin') }}</h3>
                </div><!-- end   :: Card header -->
                <!-- begin :: Inputs wrapper -->
                <div class="inputs-wrapper">
                    @include('dashboard.admins.form')
                </div><!-- end   :: Inputs wrapper -->

                <!-- begin :: Form footer -->
                <div class="form-footer d-flex justify-content-center gap-5">
                    <!-- begin :: Submit btn -->
                    <button type="submit" class="btn text-light " style="background-color: #8E6FAF; font-weight:bold;"
                        id="submit-btn" onClick="reload">
                        <span class="indicator-label">{{ __('Save') }}</span>
                        <!-- begin :: Indicator -->
                        <span class="indicator-progress">{{ __('Please wait ...') }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span><!-- end   :: Indicator -->
                    </button><!-- end   :: Submit btn -->

                    <a class="btn text-light  " style="background-color: #979797; font-weight:bold;"
                        href="{{ route('dashboard.admins.index') }}">
                        {{ __('Cancel') }} </a>
                </div><!-- end   :: Form footer -->
            </form><!-- end   :: Form -->
        </div><!-- end   :: Card body -->
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('togglePasswordVisibility').addEventListener('click', function() {
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
