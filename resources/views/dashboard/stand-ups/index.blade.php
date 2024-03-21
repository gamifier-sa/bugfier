@extends('dashboard.layouts.master')
@push('styles')
    <link href="{{ asset('dashboard-assets/css/datatables' . (isDarkMode() ? '.dark' : '') . '.bundle.css') }}"
        rel="stylesheet" type="text/css" />

    <link href="{{ asset('dashboard-assets/css/Tabels.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('title')
    {{ __('Stand Up list') }}
@endsection

@section('content')
    <div class="d-flex justify-content-between mb-5 flex-sm-row flex-col align-items-center">
        <div class="col-auto">
            @component('components.dashboard.breadcrumb')
                @slot('breadcrumb_title')
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ __('Stand Ups') }}</h1>
                    <!-- end   :: Title -->
                @endslot
                <!-- begin :: Item -->
                <li class="breadcrumb-item text-muted">{{ __('Stand Up list') }}</li><!-- end   :: Item -->
            @endcomponent


        </div>
        <div class="d-flex col-auto  align-items-cener m-0 flex-wrap  ">
        <!--begin::Filter-->
        <button type="button" class="btn my-gold p-1 pe-0  me-3" data-kt-menu-trigger="click"
                data-kt-menu-placement="bottom-end">
            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
            <span class="svg-icon svg-icon-2" style="margin:0!important; ">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                            fill="currentColor" />
                    </svg>
                </span><!--end::Svg Icon-->

        </button>



        <!--begin::Menu 1-->
        <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
            <!--begin::Header-->
            <div class="px-7 py-5">
                <div class="fs-5 text-dark fw-bold">{{ __('Filter Options') }}</div>
            </div><!--end::Header-->

            <!--begin::Separator-->
            <div class="separator border-gray-200"></div><!--end::Separator-->

            <form action="" method="get">
            <!--begin::Content-->
            <div class="px-7 py-5" data-kt-docs-table-filter="form">
                <!--begin::Input group-->
                <div class="mb-10">
                    <label class="form-label fs-6 fw-semibold" for="from_date">{{ __('From Date') }}</label>
                    <input class="form-control form-control-solid fw-bold" id="from_date" type="datetime-local" name="from_date" value="{{$fromDate}}">
                </div><!--end::Input group-->


                <!--begin::Input group-->
                <div class="mb-10">
                    <label class="form-label fs-6 fw-semibold" for="to_date">{{ __('To Date') }}</label>
                    <input class="form-control form-control-solid fw-bold" id="to_date" type="datetime-local" name="to_date" value="{{$fromDate}}">
                </div><!--end::Input group-->


                <!--begin::Actions-->
                <div class="d-flex justify-content-end">
                    <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"
                            data-kt-menu-dismiss="true" data-kt-docs-table-filter="reset">{{ __('Reset') }}</button>
                    <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true"
                            data-kt-docs-table-filter="filter">{{ __('Apply') }}</button>
                </div><!--end::Actions-->
            </div><!--end::Content--><!--end::Filter-->

            </form>
        </div><!-- end   :: Filter -->


        <div class="d-flex col-auto  align-items-cener m-0 flex-wrap  ">
            <!-- begin :: Toolbar -->
            <div class="d-flex justify-content-end align-items-center" data-kt-docs-table-toolbar="base">
                @can('create_stand_ups')
                    <!-- begin :: Add Button -->
                    <a href="{{ route('dashboard.stand-ups.create') }}" class="btn my-gold p-1 pe-0" data-bs-toggle="tooltip" title="">

                        <span class="svg-icon svg-icon-2" style="margin:0!important; ">
                            <i class="fa fa-plus fa-lg"></i>
                        </span>

                    </a><!-- end   :: Add Button -->
                @endcan
            </div><!-- end   :: Toolbar -->

        </div><!-- end   :: Filter -->
        </div>
    </div>
    <!-- begin :: Datatable card -->

    <div class="card table-contaner-2 mb-2" style="background-color: transparent">
        <!-- begin :: Card Body -->
        <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
            <!-- begin :: Datatable -->
            <table data-ordering="false" id="kt_datatable" class="table text-center table-row-dashed fs-6 gy-5">

                <thead>
                    <tr class="text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th><div class='d-flex my-td-inner align-items-center justify-center for-date' style="background-color: #8E6FAF;">#</div></th>
                        <th>
                            <div class='d-flex my-td-inner align-items-center justify-center for-date' style="background-color: #8E6FAF;">
                                <h3 class="fs-6"> {{ __('Name') }}</h3>
                            </div>
                        </th>

                        <th>
                            <div class='d-flex my-td-inner align-items-center justify-center for-date' style="background-color: #8E6FAF;">
                                <h3 class="fs-6"> {{ __('Attend') }}</h3>
                            </div>
                        </th>

                        <th>
                            <div class='d-flex my-td-inner align-items-center justify-center for-date' style="background-color: #8E6FAF;">
                                <h3 class="fs-6"> {{ __('Not Attend') }}</h3>
                            </div>
                        </th>

                        <th class="min-w-100px">
                            <div class='d-flex my-td-inner align-items-center justify-center for-date' style="background-color: #8E6FAF;">
                                <h3 class="fs-6">{{ __('Vacation') }}</h3>
                            </div>
                        </th>
                    </tr>
                </thead>

                <tbody class="text-gray-600 fw-bold text-center">
                @forelse($usersData as $data)
                <tr class="row-selected">
                    <td>{{$loop->iteration}}</td>
                    <td>
                          {{$data['name']}}
                    </td>
                    <td>
                          {{$data['attend']}}
                    </td>
                    <td>
                        {{$data['not_attend']}}
                    </td>
                    <td>
                        {{$data['vacation']}}
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <span class="badge badge-light-danger">{{__('There is no data')}}</span>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table><!-- end   :: Datatable -->
        </div><!-- end   :: Card Body -->
    </div><!-- end   :: Datatable card -->
@endsection
@push('scripts')
    <script src="{{ asset('dashboard-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
{{--    <script src="{{ asset('dashboard-assets/datatables/stand_ups.js') }}"></script>--}}
@endpush
