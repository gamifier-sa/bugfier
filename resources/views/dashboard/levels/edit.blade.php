@extends('dashboard.layouts.master')
@section('title') {{__("Edit"). ' - '. $level->title}} @endsection
@section('content')

    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.levels.index') }}" class="text-muted text-hover-primary">{{ __("Levels") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Edit An Levels')}}</li><!-- end   :: Item -->
    @endcomponent

    <div class="card  mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="card-body">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.levels.update', $level->id) }}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.levels.index') }}">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header card-header-stretch">
                        <h3 class="card-title">{{__('Add New Project')}}</h3>
                        <div class="card-toolbar">
                            <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                                <li class="nav-item">
                                    <a class="nav-link @if(getLocale() == 'ar') active @endif" data-bs-toggle="tab" href="#arabic">{{__('Arabic')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if(getLocale() == 'en') active @endif" data-bs-toggle="tab" href="#english">{{__('English')}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @include('dashboard.levels.form')
                </div>

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

                    <a class="btn btn-secondary" href="{{ route('dashboard.levels.index')}}"> {{__("Cancel")}} </a>
                </div><!-- end   :: Form footer -->
            </form>
            <!-- end   :: Form -->
        </div><!-- end   :: Card body -->
    </div>

@endsection
