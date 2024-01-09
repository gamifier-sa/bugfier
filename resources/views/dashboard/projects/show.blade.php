@extends('dashboard.layouts.master')
@section('title') {{__("Edit"). ' - '. $project->title}} @endsection
@section('content')

    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.projects.index') }}" class="text-muted text-hover-primary">{{ __("Projects") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{$project->title}}</li><!-- end   :: Item -->
    @endcomponent

    <!--begin::Navbar-->
    <div class="card">
        <div class="card-body pt-9 pb-0">
            <!--begin::Details-->
            <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                <!--begin::Wrapper-->
                <div class="flex-grow-1">
                    <!--begin::Head-->
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                        <!--begin::Details-->
                        <div class="d-flex flex-column">

                            <!--begin::Status-->
                            <div class="d-flex align-items-center mb-1">
                                <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bold me-3">{{$project->title}}</a>
                            </div><!--end::Status-->

                            <!--begin::Description-->
                            <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-800">{!! $project->description !!}</div><!--end::Description-->
                        </div><!--end::Details-->

                        <!--begin::Actions-->
                        <div class="d-flex mb-4">
                            <a href="{{route('dashboard.projects.create')}}" class="btn btn-sm btn-bg-light btn-active-color-primary me-3">{{__('Create Project')}}</a>
                            <a href="{{route('dashboard.projects.edit', $project->id)}}" class="btn btn-sm btn-primary me-3" >{{__('Edit - '. $project->title)}}</a>
                        </div><!--end::Actions-->
                    </div><!--end::Head-->

                    <!--begin::Info-->
                    <div class="d-flex flex-wrap justify-content-start">
                        <!--begin::Stats-->
                        <div class="d-flex flex-wrap">
                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    <div class="fs-4 fw-bold">{{$project->created_at->format('Y-M-d')}}</div>
                                </div><!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-400">{{__('Date')}}</div><!--end::Label-->
                            </div><!--end::Stat-->
                        </div><!--end::Stats-->
                    </div><!--end::Info-->
                </div><!--end::Wrapper-->
            </div><!--end::Details-->
        </div>
    </div><!--end::Navbar-->
@endsection
