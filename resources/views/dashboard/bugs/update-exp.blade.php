@extends('dashboard.layouts.master')

@section('title') {{__("Update Experience")}} @endsection

@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.bugs.index') }}" class="text-muted text-hover-primary">{{ __("Bugs") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Update Experience')}}</li><!-- end   :: Item -->
    @endcomponent

    <div class="card mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="card-body">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.bug.exp-update', $bug->id)}}" class="form" method="post" id="submitted-form"
                  data-redirection-url="{{ route('dashboard.bugs.index') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <h3 class="fw-bolder text-dark">{{ __("Update Experience") }}</h3>
                </div><!-- end   :: Card header -->
                      <!-- begin :: Inputs wrapper -->
                <div class="inputs-wrapper">
                    <div class="row mb-8 p-5">
                        <!-- begin :: Row -->
                        <div class="row mb-8 p-5">
                            <!-- begin :: Column -->
                            <div class="col-md-12 fv-row">
                                <label class="fs-5 fw-bold mb-2 required">{{ __("Experience") }}</label>
                                <div class="form-floating">
                                    <input type="number" class="form-control gui-input" id="exp_inp" name="exp" value="{{old('exp', $bug->exp)}}" autocomplete="off" required/>
                                    <label for="exp_inp">{{ __("Enter the Experience") }}</label>
                                </div>
                                <p class="invalid-feedback" id="exp" ></p>
                            </div><!-- end   :: Column -->
                        </div><!-- end   :: Row -->
                    </div>
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

                    <a class="btn btn-secondary" href="{{ route('dashboard.bugs.index')}}"> {{__("Cancel")}} </a>
                </div><!-- end   :: Form footer -->
            </form><!-- end   :: Form -->
        </div><!-- end   :: Card body -->
    </div>
@endsection
