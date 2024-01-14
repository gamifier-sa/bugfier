@extends('dashboard.layouts.master')
@inject('bug','App\Models\Bug')
@section('title') {{__("add new bug")}} @endsection

@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.bugs.index') }}" class="text-muted text-hover-primary">{{ __("Bugs") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Add New Bug')}}</li><!-- end   :: Item -->
    @endcomponent

    <div class="card mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="card-body">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.bugs.store')}}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.bugs.index') }}" enctype="multipart/form-data">
                @csrf
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <h3 class="fw-bolder text-dark">{{ __("Add New Bug") }}</h3>
                </div><!-- end   :: Card header -->
                      <!-- begin :: Inputs wrapper -->
                <div class="inputs-wrapper">
                    @include('dashboard.bugs.form')
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

@push('scripts')
    <script src="{{asset('dashboard-assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#kt_docs_ckeditor_classic'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
