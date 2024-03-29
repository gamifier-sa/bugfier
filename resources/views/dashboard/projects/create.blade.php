@extends('dashboard.layouts.master')
@inject('project', 'App\Models\Project')
@section('title')
    {{ __('add new project') }}
@endsection

@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.projects.index') }}"
                    class="text-muted text-hover-primary">{{ __('Projects') }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{ __('Add New Project') }}</li><!-- end   :: Item -->
    @endcomponent

    <div class=" mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="mt-15">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.projects.store') }}" class="form" method="post" id="submitted-form"
                data-redirection-url="{{ route('dashboard.projects.index') }}">
                @csrf
                @include('dashboard.projects.form')

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
                        href="{{ route('dashboard.projects.index') }}"> {{ __('Cancel') }} </a>
                </div><!-- end   :: Form footer -->
            </form><!-- end   :: Form -->
        </div><!-- end   :: Card body -->
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('dashboard-assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#kt_docs_ckeditor_classic'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#kt_docs_ckeditor_classic2'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
