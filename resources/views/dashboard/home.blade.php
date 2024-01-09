@extends('dashboard.layouts.master')
@section('title') {{ __("Home") }} @endsection

@section('content')
    <!--begin::Row-->
    <div class="row g-5 g-xl-8">
        <div class="col-xl-4">
            <!--begin::Statistics Widget 5-->
            <a href="{{route('dashboard.admins.index')}}" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon-->
                    <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4" d="M9 2C6.38 2 4.25 4.13 4.25 6.75C4.25 9.32 6.26 11.4 8.88 11.49C8.96 11.48 9.04 11.48 9.1 11.49C9.12 11.49 9.13 11.49 9.15 11.49C9.16 11.49 9.16 11.49 9.17 11.49C11.73 11.4 13.74 9.32 13.75 6.75C13.75 4.13 11.62 2 9 2Z" fill="white"/>
                            <path d="M14.08 14.1499C11.29 12.2899 6.73996 12.2899 3.92996 14.1499C2.65996 14.9999 1.95996 16.1499 1.95996 17.3799C1.95996 18.6099 2.65996 19.7499 3.91996 20.5899C5.31996 21.5299 7.15996 21.9999 8.99996 21.9999C10.84 21.9999 12.68 21.5299 14.08 20.5899C15.34 19.7399 16.04 18.5999 16.04 17.3599C16.03 16.1299 15.34 14.9899 14.08 14.1499Z" fill="white"/>
                            <path opacity="0.4" d="M19.9899 7.3401C20.1499 9.2801 18.7699 10.9801 16.8599 11.2101C16.8499 11.2101 16.8499 11.2101 16.8399 11.2101H16.8099C16.7499 11.2101 16.6899 11.2101 16.6399 11.2301C15.6699 11.2801 14.7799 10.9701 14.1099 10.4001C15.1399 9.4801 15.7299 8.1001 15.6099 6.6001C15.5399 5.7901 15.2599 5.0501 14.8399 4.4201C15.2199 4.2301 15.6599 4.1101 16.1099 4.0701C18.0699 3.9001 19.8199 5.3601 19.9899 7.3401Z" fill="white"/>
                            <path d="M21.9902 16.5899C21.9102 17.5599 21.2902 18.3999 20.2502 18.9699C19.2502 19.5199 17.9902 19.7799 16.7402 19.7499C17.4602 19.0999 17.8802 18.2899 17.9602 17.4299C18.0602 16.1899 17.4702 14.9999 16.2902 14.0499C15.6202 13.5199 14.8402 13.0999 13.9902 12.7899C16.2002 12.1499 18.9802 12.5799 20.6902 13.9599C21.6102 14.6999 22.0802 15.6299 21.9902 16.5899Z" fill="white"/>
                        </svg>
                    </span><!--end::Svg Icon-->

                    <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">{{$countAdmins}}</div>
                    <div class="fw-semibold text-gray-100">{{__('Admins')}}</div>
                </div><!--end::Body-->
            </a><!--end::Statistics Widget 5-->
        </div>

        <div class="col-xl-4">
            <!--begin::Statistics Widget 5-->
            <a href="{{route('dashboard.admins.index')}}" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon-->
                    <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4" d="M9 2C6.38 2 4.25 4.13 4.25 6.75C4.25 9.32 6.26 11.4 8.88 11.49C8.96 11.48 9.04 11.48 9.1 11.49C9.12 11.49 9.13 11.49 9.15 11.49C9.16 11.49 9.16 11.49 9.17 11.49C11.73 11.4 13.74 9.32 13.75 6.75C13.75 4.13 11.62 2 9 2Z" fill="white"/>
                            <path d="M14.08 14.1499C11.29 12.2899 6.73996 12.2899 3.92996 14.1499C2.65996 14.9999 1.95996 16.1499 1.95996 17.3799C1.95996 18.6099 2.65996 19.7499 3.91996 20.5899C5.31996 21.5299 7.15996 21.9999 8.99996 21.9999C10.84 21.9999 12.68 21.5299 14.08 20.5899C15.34 19.7399 16.04 18.5999 16.04 17.3599C16.03 16.1299 15.34 14.9899 14.08 14.1499Z" fill="white"/>
                            <path opacity="0.4" d="M19.9899 7.3401C20.1499 9.2801 18.7699 10.9801 16.8599 11.2101C16.8499 11.2101 16.8499 11.2101 16.8399 11.2101H16.8099C16.7499 11.2101 16.6899 11.2101 16.6399 11.2301C15.6699 11.2801 14.7799 10.9701 14.1099 10.4001C15.1399 9.4801 15.7299 8.1001 15.6099 6.6001C15.5399 5.7901 15.2599 5.0501 14.8399 4.4201C15.2199 4.2301 15.6599 4.1101 16.1099 4.0701C18.0699 3.9001 19.8199 5.3601 19.9899 7.3401Z" fill="white"/>
                            <path d="M21.9902 16.5899C21.9102 17.5599 21.2902 18.3999 20.2502 18.9699C19.2502 19.5199 17.9902 19.7799 16.7402 19.7499C17.4602 19.0999 17.8802 18.2899 17.9602 17.4299C18.0602 16.1899 17.4702 14.9999 16.2902 14.0499C15.6202 13.5199 14.8402 13.0999 13.9902 12.7899C16.2002 12.1499 18.9802 12.5799 20.6902 13.9599C21.6102 14.6999 22.0802 15.6299 21.9902 16.5899Z" fill="white"/>
                        </svg>
                    </span><!--end::Svg Icon-->

                    <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">{{$countUsers}}</div>
                    <div class="fw-semibold text-gray-100">{{__('Users')}}</div>
                </div><!--end::Body-->
            </a><!--end::Statistics Widget 5-->
        </div>

        <div class="col-xl-4">
            <!--begin::Statistics Widget 5-->
            <a href="{{route('dashboard.bugs.index')}}" class="card bg-success hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                    <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
                            <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor" />
                            <rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
                            <rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
                        </svg>
                    </span><!--end::Svg Icon-->

                    <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">{{$countBugs}}</div>
                    <div class="fw-semibold text-gray-100">{{__('Bugs')}}</div>
                </div><!--end::Body-->
            </a><!--end::Statistics Widget 5-->
        </div>

        <div class="col-xl-4">
            <!--begin::Statistics Widget 5-->
            <a href="{{route('dashboard.projects.index')}}" class="card bg-secondary hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="currentColor" />
                            <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <div class="text-gray-600 fw-bold fs-2 mb-2 mt-5">{{$countProjects}}</div>
                    <div class="fw-semibold text-gray-600">{{__('Projects')}}</div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>

        <div class="col-xl-4">
            <!--begin::Statistics Widget 5-->
            <a href="{{route('dashboard.awards.index')}}" class="card bg-danger hoverable card-xl-stretch mb-5 mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotune/graphs/gra007.svg-->
                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4" d="M19 9C19 10.45 18.57 11.78 17.83 12.89C16.75 14.49 15.04 15.62 13.05 15.91C12.71 15.97 12.36 16 12 16C11.64 16 11.29 15.97 10.95 15.91C8.96 15.62 7.25 14.49 6.17 12.89C5.43 11.78 5 10.45 5 9C5 5.13 8.13 2 12 2C15.87 2 19 5.13 19 9Z" fill="white"/>
                            <path d="M21.25 18.4699L19.6 18.8599C19.23 18.9499 18.94 19.2299 18.86 19.5999L18.51 21.0699C18.32 21.8699 17.3 22.1099 16.77 21.4799L12 15.9999L7.22996 21.4899C6.69996 22.1199 5.67996 21.8799 5.48996 21.0799L5.13996 19.6099C5.04996 19.2399 4.75996 18.9499 4.39996 18.8699L2.74996 18.4799C1.98996 18.2999 1.71996 17.3499 2.26996 16.7999L6.16996 12.8999C7.24996 14.4999 8.95996 15.6299 10.95 15.9199C11.29 15.9799 11.64 16.0099 12 16.0099C12.36 16.0099 12.71 15.9799 13.05 15.9199C15.04 15.6299 16.75 14.4999 17.83 12.8999L21.73 16.7999C22.28 17.3399 22.01 18.2899 21.25 18.4699Z" fill="white"/>
                            <path d="M12.58 5.98L13.17 7.15999C13.25 7.31999 13.46 7.48 13.65 7.51L14.72 7.68999C15.4 7.79999 15.56 8.3 15.07 8.79L14.24 9.61998C14.1 9.75998 14.02 10.03 14.07 10.23L14.31 11.26C14.5 12.07 14.07 12.39 13.35 11.96L12.35 11.37C12.17 11.26 11.87 11.26 11.69 11.37L10.69 11.96C9.96997 12.38 9.53997 12.07 9.72997 11.26L9.96997 10.23C10.01 10.04 9.93997 9.75998 9.79997 9.61998L8.96997 8.79C8.47997 8.3 8.63997 7.80999 9.31997 7.68999L10.39 7.51C10.57 7.48 10.78 7.31999 10.86 7.15999L11.45 5.98C11.74 5.34 12.26 5.34 12.58 5.98Z" fill="white"/>
                       </svg>

                    </span>
                    <!--end::Svg Icon-->
                    <div class="text-white fw-bold fs-2 mb-2 mt-5">{{$countAwards}}</div>
                    <div class="fw-semibold text-white">{{__('Awards')}}</div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>

        <div class="col-xl-4">
            <!--begin::Statistics Widget 5-->
            <a href="{{route('dashboard.statuses.index')}}" class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotune/graphs/gra007.svg-->
                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.19995 14.02C3.12995 18.58 7.15995 22 12 22C16.82 22 20.8399 18.59 21.7899 14.05" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.48996 3.07007C4.80996 4.43007 2.81996 6.96007 2.20996 9.98007" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M21.81 10.06C20.91 5.46 16.86 2 12 2" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 13.5C12.8284 13.5 13.5 12.8284 13.5 12C13.5 11.1716 12.8284 10.5 12 10.5C11.1716 10.5 10.5 11.1716 10.5 12C10.5 12.8284 11.1716 13.5 12 13.5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>


                    </span>
                    <!--end::Svg Icon-->
                    <div class="text-white fw-bold fs-2 mb-2 mt-5">{{$countStatuses}}</div>
                    <div class="fw-semibold text-white">{{__('Status')}}</div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>


    </div>
    <!--end::Row-->
@endsection
