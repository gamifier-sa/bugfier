@extends('dashboard.layouts.master')
@inject('level', 'App\Models\Level')
@section('title')
    {{ __('Add New Level') }}
@endsection

@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.levels.index') }}"
                    class="text-muted text-hover-primary">{{ __('Levels') }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{ __('Add New Level') }}</li><!-- end   :: Item -->
    @endcomponent

    <div class=" mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="mt-10">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.levels.store') }}" class="form" method="post" id="submitted-form"
                data-redirection-url="{{ route('dashboard.levels.index') }}">
                @csrf
                @include('dashboard.levels.form')
                <!-- begin :: Form footer -->
                <div class="form-footer">
                    <!-- begin :: Submit btn -->
                    <button type="submit" class="btn " id="submit-btn" onClick="reload">
                        <span class="indicator-label">{{ __('Save') }}</span>
                        <!-- begin :: Indicator -->
                        <span class="indicator-progress">{{ __('Please wait ...') }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span><!-- end   :: Indicator -->
                    </button><!-- end   :: Submit btn -->

                    <a class="btn " href="{{ route('dashboard.levels.index') }}"> {{ __('Cancel') }} </a>
                </div><!-- end   :: Form footer -->
            </form><!-- end   :: Form -->
        </div><!-- end   :: Card body -->
    </div>
@endsection
