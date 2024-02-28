@extends('dashboard.layouts.master')

@section('title') {{__('Edit An Stand Ups')}} @endsection
@section('content')

    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.stand-ups.index') }}" class="text-muted text-hover-primary">{{ __("Stand Ups") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Edit An Stand Ups')}}</li><!-- end   :: Item -->
    @endcomponent

    <div class="card  mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="card-body">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.stand-ups.update', $standUp->id) }}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.stand-ups.index') }}">
                @csrf
                @method('PUT')

                <!-- begin :: Row -->
                <div class="row form-group mb-8 p-5">
                    <!-- begin :: Column -->
                    <div class="col-md-3">
                        <h1 class="pt-3">
                            <!--begin::Label-->

                            <label class="col-form-label text-lg-start">{{$standUp->admin->full_name}}:</label><!--end::Label-->
                        </h1>
                        <input type="hidden" name="user_id" value="{{$standUp->user_id}}">
                    </div><!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-4 fv-row">
                        <label class="fs-5 fw-bold mb-2" for="date_inp">{{ __("Attendance date") }}: </label>
                        <input type="datetime-local" class="form-control gui-input" id="date_inp" name="date" value="{{now()}}" autocomplete="off"/>
                        <p class="invalid-feedback" id="date"></p>
                    </div><!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-4 fv-row">
                        <label class="fs-5 fw-bold mb-2" for="attendance_inp">{{__('Did you come today?')}}</label>
                        <select id="attendance_inp" class="form-control" name="attendance" data-control="select2" data-hide-search="false" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                            <option selected disabled>{{__('Please Choose')}}</option>
                            <option @selected(old('attendance', $standUp->attendance) == 'attend') value="attend">{{__('attend')}}</option>
                            <option @selected(old('attendance', $standUp->attendance) == 'not_attend') value="not_attend">{{__('not_attend')}}</option>
                            <option @selected(old('attendance', $standUp->attendance) == 'vacation') value="vacation">{{__('vacation')}}</option>
                        </select>
                        <p class="invalid-feedback" id="attendance"></p>
                    </div><!-- end   :: Column -->
                </div><!-- end   :: Row -->

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

                    <a class="btn btn-secondary" href="{{ route('dashboard.stand-ups.index')}}"> {{__("Cancel")}} </a>
                </div><!-- end   :: Form footer -->
            </form>
            <!-- end   :: Form -->
        </div><!-- end   :: Card body -->
    </div>

@endsection
