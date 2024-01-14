@extends('dashboard.layouts.master')
@push('styles')
    <link href="{{ asset('dashboard-assets/css/datatables' . ( isDarkMode() ?  '.dark' : '' ) .'.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@section('title') {{__("Bug list")}} @endsection

@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ __("Bugs") }}</h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Bug list')}}</li><!-- end   :: Item -->
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
                    <!--begin::Filter-->
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                        <span class="svg-icon svg-icon-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor" />
                        </svg>
                    </span><!--end::Svg Icon-->
                        Filter
                    </button>

                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bold">Filter Options</div>
                        </div><!--end::Header-->

                        <!--begin::Separator-->
                        <div class="separator border-gray-200"></div><!--end::Separator-->

                        <!--begin::Content-->
                        <div class="px-7 py-5" data-kt-docs-table-filter="form">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <label class="form-label fs-6 fw-semibold">Team:</label>
                                <select class="form-select form-select-solid fw-bold" name="status" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-docs-table-filter="search" data-hide-search="true">
                                    <option></option>
                                    @foreach($statuses as $status)
                                        <option @selected(old('status') == $status->title) value="{{ $status->title}}">{{ __($status->title) }}</option>
                                    @endforeach
                                </select>
                            </div><!--end::Input group-->

                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-docs-table-filter="reset">Reset</button>
                                <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-docs-table-filter="filter">Apply</button>
                            </div><!--end::Actions-->
                        </div><!--end::Content-->
                    </div><!--end::Filter-->


                @can('create_bugs')
                        <!-- begin :: Add Button -->
                        <a href="{{ route('dashboard.bugs.create') }}" class="btn btn-primary" data-bs-toggle="tooltip" title="">

                        <span class="svg-icon svg-icon-2">
                            <i class="fa fa-plus fa-lg"></i>
                        </span>
                            {{ __("add new bug") }}
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
                    <th>{{ __("Project") }}</th>
                    <th>{{ __("Created By") }}</th>
                    <th>{{ __("Point") }}</th>
                    <th>{{ __("Status") }}</th>
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
        let route         = "{{ route('dashboard.bugs.index') }}";
        let csrfToken     = "{{ csrf_token() }}";
        let currentUserId = {{ auth()->id() }};
        let authorizationUpdate = @can('update_bugs') 'true' @else '' @endcan;
        let authorizationDelete = @can('delete_bugs') 'true' @else '' @endcan;
        let authorizationShow   = @can('show_bugs') 'true' @else '' @endcan
    </script>

    <script src="{{ asset('dashboard-assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{ asset('dashboard-assets/datatables/bugs.js')}}"></script>


@endpush
