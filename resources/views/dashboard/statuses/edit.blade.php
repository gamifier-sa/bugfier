@extends('dashboard.layouts.master')
@section('title') {{__("Edit"). ' - '. $status->title}} @endsection
@section('content')

    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.statuses.index') }}" class="text-muted text-hover-primary">{{ __("Statuses") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Edit An Statuses')}}</li><!-- end   :: Item -->
    @endcomponent

    <div class="card  mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="card-body">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.statuses.update', $status->id) }}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.statuses.index') }}">
                @csrf
                @method('PUT')

                @include('dashboard.statuses.form')


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

                    <a class="btn btn-secondary" href="{{ route('dashboard.statuses.index')}}"> {{__("Cancel")}} </a>
                </div><!-- end   :: Form footer -->
            </form>
            <!-- end   :: Form -->
        </div><!-- end   :: Card body -->
    </div>

@endsection
