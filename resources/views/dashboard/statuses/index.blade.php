@extends('dashboard.layouts.master')
@push('styles')
    <link href="{{ asset('dashboard-assets/css/datatables' . (isDarkMode() ? '.dark' : '') . '.bundle.css') }}"
        rel="stylesheet" type="text/css" />

    <link href="{{ asset('dashboard-assets/css/Tabels.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('title')
    {{ __('Status list') }}
@endsection

@section('content')
    <div class="d-flex justify-content-between mb-5 flex-sm-row flex-col align-items-center">
        <div class="col-auto">
            @component('components.dashboard.breadcrumb')
                @slot('breadcrumb_title')
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ __('Statuses') }}</h1>
                    <!-- end   :: Title -->
                @endslot
                <!-- begin :: Item -->
                <li class="breadcrumb-item text-muted">{{ __('Status list') }}</li><!-- end   :: Item -->
            @endcomponent


        </div>
        <!-- begin :: Filter -->
        <div class="d-flex col-auto  align-items-cener m-0 flex-wrap  ">

            <!-- begin :: General Search -->
            <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <i class="fa fa-search fa-lg"></i>
                </span>
                <input type="text" class="form-control form-control-solid w-200px ps-15 border-gray-300 border-1"
                    id="general-search-inp" style="border-radius: 20px;" placeholder="{{ __('Search ...') }}">

            </div><!-- end   :: General Search -->


            <!-- begin :: Toolbar -->
            <div class="d-flex justify-content-end align-items-center" data-kt-docs-table-toolbar="base">
                @can('create_statuses')
                    <!-- begin :: Add Button -->
                    <a href="{{ route('dashboard.statuses.create') }}" class="btn my-gold p-1 pe-0" data-bs-toggle="tooltip"
                        title="">

                        <span class="svg-icon svg-icon-2" style="margin:0!important; ">
                            <i class="fa fa-plus fa-lg"></i>
                        </span>

                    </a><!-- end   :: Add Button -->
                @endcan
            </div><!-- end   :: Toolbar -->

        </div><!-- end   :: Filter -->
    </div>
    <!-- begin :: Datatable card -->

    <div class="card table-contaner-2 mb-2" style="background-color: transparent">
        <!-- begin :: Card Body -->
        <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">



            <!-- begin :: Datatable -->
            <table data-ordering="false" id="kt_datatable" class="table text-center table-row-dashed fs-6 gy-5">

                <thead>
                    <tr class="text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th></th>
                        <th></th>
                        <th>
                            <div class='d-flex my-td-inner align-items-center justify-center for-date'
                                style="background-color: #8E6FAF;
">
                                <h3 class="fs-6">{{ __('Title') }}</h3>
                            </div>

                        </th>
                        <th>
                            <div class='d-flex my-td-inner align-items-center justify-center for-date'
                                style="background-color: #8E6FAF;
">
                                <h3 class="fs-6"> {{ __('Created Date') }}</h3>
                            </div>
                        </th>
                        <th>
                            <div class='d-flex my-td-inner align-items-center justify-center for-date'
                                style="background-color: #8E6FAF;
">
                                <h3 class="fs-6"> {{ __('Default') }}</h3>
                            </div>
                        </th>
                        <th class="min-w-100px">
                            <div class='d-flex my-td-inner align-items-center justify-center for-date'
                                style="background-color: #8E6FAF;
">
                                <h3 class="fs-6">{{ __('Actions') }}</h3>
                            </div>
                        </th>
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
        let route = "{{ route('dashboard.statuses.index') }}";
        let csrfToken = "{{ csrf_token() }}";
        let currentUserId = {{ auth()->id() }};
        let authorizationUpdate =
            @can('update_statuses')
                'true'
            @else
                ''
            @endcan ;
        let authorizationDelete =
            @can('delete_statuses')
                'true'
            @else
                ''
            @endcan ;
        let authorizationShow =
            @can('show_statuses')
                'true'
            @else
                ''
            @endcan
    </script>

    <script src="{{ asset('dashboard-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('dashboard-assets/datatables/statuses.js') }}"></script>
@endpush
