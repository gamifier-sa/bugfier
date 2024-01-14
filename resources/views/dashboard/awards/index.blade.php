@extends('dashboard.layouts.master')
@push('styles')
    <link href="{{ asset('dashboard-assets/css/datatables' . ( isDarkMode() ?  '.dark' : '' ) .'.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@section('title') {{__("Award list")}} @endsection

@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ __("Awards") }}</h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Award list')}}</li><!-- end   :: Item -->
    @endcomponent

    <!-- begin :: Datatable card -->
    <div class="card mb-2">
        <!-- begin :: Card Body -->
        <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">

            <!-- begin :: Filter -->
            <div class="d-flex flex-stack flex-wrap mb-15">

                <!-- begin :: General Search -->
                <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                           <i class="fa fa-search fa-lg" ></i>
                    </span>
                    <input type="text" class="form-control form-control-solid w-250px ps-15 border-gray-300 border-1" id="general-search-inp" placeholder="{{ __("Search ...") }}">

                </div><!-- end   :: General Search -->


                <!-- begin :: Toolbar -->
                <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                    @can('create_awards')
                        <!-- begin :: Add Button -->
                        <a href="{{ route('dashboard.awards.create') }}" class="btn btn-primary" data-bs-toggle="tooltip" title="">

                        <span class="svg-icon svg-icon-2">
                            <i class="fa fa-plus fa-lg"></i>
                        </span>
                            {{ __("add new award") }}
                        </a><!-- end   :: Add Button -->
                    @endcan
                </div><!-- end   :: Toolbar -->

            </div><!-- end   :: Filter -->

            <!-- begin :: Datatable -->
            <table data-ordering="false" id="kt_datatable" class="table text-center table-row-dashed fs-6 gy-5">

                <thead>
                <tr class="text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                    <th>#</th>
                    <th>ID</th>
                    <th>{{ __("title") }}</th>
                    <th>{{ __("Point") }}</th>
                    <th>{{ __("created date") }}</th>
                    <th class="min-w-100px">{{ __("Actions") }}</th>
                </tr>
                </thead>

                <tbody class="text-gray-600 fw-bold text-center">

                </tbody>
            </table><!-- end   :: Datatable -->
        </div><!-- end   :: Card Body -->
    </div><!-- end   :: Datatable card -->

@endsection
@push('scripts')
    <script>
        let route               = "{{ route('dashboard.awards.index') }}";
        let csrfToken           = "{{ csrf_token() }}";
        let currentUserId       = {{ auth()->id() }};
        let authorizationUpdate = @can('update_awards') 'true' @else '' @endcan;
        let authorizationDelete = @can('delete_awards') 'true' @else '' @endcan;
        let authorizationShow   = @can('show_awards') 'true' @else '' @endcan
    </script>

    <script src="{{ asset('dashboard-assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{ asset('dashboard-assets/datatables/awards.js')}}?{{now()}}"></script>

@endpush
