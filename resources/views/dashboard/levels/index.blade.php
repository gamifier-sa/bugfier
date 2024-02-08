@extends('dashboard.layouts.master')
@push('styles')
    <link href="{{ asset('dashboard-assets/css/datatables' . (isDarkMode() ? '.dark' : '') . '.bundle.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard-assets/css/Tabels.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('title')
    {{ __('Level list') }}
@endsection

@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ __('Levels') }}</h1><!-- end   :: Level -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{ __('Level list') }}</li><!-- end   :: Item -->
    @endcomponent


    <!-- begin :: Filter -->
    <div class="d-flex flex-column align-items-end gap-5 flex-wrap mb-5 container-fluid">

        <!-- begin :: General Search -->
        <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                <i class="fa fa-search fa-lg"></i>
            </span>
            <input type="text" class="form-control form-control-solid w-250px ps-15 border-gray-300 border-1"
                id="general-search-inp" placeholder="{{ __('Search ...') }}">

        </div><!-- end   :: General Search -->


        <!-- begin :: Toolbar -->
        <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
            @can('create_levels')
                <!-- begin :: Add Button -->
                <a href="{{ route('dashboard.levels.create') }}" class="btn my-gold" data-bs-toggle="tooltip" title="">

                    <span class="svg-icon svg-icon-2">
                        <i class="fa fa-plus fa-lg"></i>
                    </span>

                </a><!-- end   :: Add Button -->
            @endcan
        </div><!-- end   :: Toolbar -->

    </div><!-- end   :: Filter -->

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
                                <h3 class="fs-6">{{ __('Level') }}
                                </h3>
                            </div>


                        </th>
                        <th>
                            <div class='d-flex my-td-inner align-items-center justify-center for-date'
                                style="background-color: #8E6FAF;
">
                                <h3 class="fs-6">{{ __('Created Date') }}
                                </h3>
                            </div>
                        </th>
                        <th>
                            <div class='d-flex my-td-inner align-items-center justify-center for-date'
                                style="background-color: #8E6FAF;
">
                                <h3 class="fs-6"> {{ __('Experience') }}
                                </h3>
                            </div>
                        </th>
                        <th class="min-w-100px">
                            <div class='d-flex my-td-inner align-items-center justify-center for-date'
                                style="background-color: #8E6FAF;
">
                                <h3 class="fs-6"> {{ __('Actions') }}
                                </h3>
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
        let route = "{{ route('dashboard.levels.index') }}";
        let csrfToken = "{{ csrf_token() }}";
        let currentUserId = {{ auth()->id() }};
        let authorizationUpdate =
            @can('update_levels')
                'true'
            @else
                ''
            @endcan ;
        let authorizationDelete =
            @can('delete_levels')
                'true'
            @else
                ''
            @endcan ;
        let authorizationShow =
            @can('show_levels')
                'true'
            @else
                ''
            @endcan
    </script>

    <script src="{{ asset('dashboard-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('dashboard-assets/datatables/levels.js') }}"></script>
@endpush
