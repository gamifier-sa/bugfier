@extends('dashboard.layouts.master')
@inject('award', 'App\Models\Award')
@section('title')
    {{ __('add new award') }}
@endsection

@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.awards.index') }}"
                    class="text-muted text-hover-primary">{{ __('Awards') }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{ __('Add New Award') }}</li><!-- end   :: Item -->
    @endcomponent

    <div class=" mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="mt-10">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.awards.store') }}" class="form" method="post" id="submitted-form"
                data-redirection-url="{{ route('dashboard.awards.index') }}" autocomplete="off">
                @csrf

                @include('dashboard.awards.form')

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

                    <a class="btn " href="{{ route('dashboard.awards.index') }}"> {{ __('Cancel') }} </a>
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
