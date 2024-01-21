@extends('dashboard.layouts.master')
@section('title') {{__("Show"). ' - '. $award->title}} @endsection
@section('content')

    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.awards.index') }}" class="text-muted text-hover-primary">{{ __("Awards") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{$award->title}}</li><!-- end   :: Item -->
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
                                <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bold me-3">{{$award->title}}</a>
                            </div><!--end::Status-->

                            <!--begin::Description-->
                            <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-800">{!!  $award->description !!}</div><!--end::Description-->
                        </div><!--end::Details-->

                        <!--begin::Actions-->
                        <div class="d-flex mb-4">
                            <a href="{{route('dashboard.awards.create')}}" class="btn btn-sm btn-bg-light btn-active-color-primary me-3">{{__('Create Award')}}</a>
                            <a href="{{route('dashboard.awards.edit', $award->id)}}" class="btn btn-sm btn-primary me-3" >{{__('Edit - '. $award->title)}}</a>

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
                                    <div class="fs-4 fw-bold">{{$award->created_at->format('Y-M-d')}}</div>
                                </div><!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-400">{{__('Date')}}</div><!--end::Label-->
                            </div><!--end::Stat-->
                        </div><!--end::Stats-->

                        <!--begin::Stat-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <!--begin::Number-->
                            <div class="d-flex align-items-center">

                                <div class="fs-4 fw-bold" data-kt-countup="true" data-kt-countup-value="{{$award->point}}">0</div>
                            </div><!--end::Number-->

                            <!--begin::Label-->
                            <div class="fw-semibold fs-6 text-gray-400">{{__('Points')}}</div><!--end::Label-->
                        </div><!--end::Stat-->
                    </div><!--end::Info-->


                </div><!--end::Wrapper-->
            </div><!--end::Details-->
        </div>
    </div><!--end::Navbar-->

    <!--begin::Toolbar-->
    <div class="d-flex flex-wrap flex-stack my-5">
        <!--begin::Heading-->
        <h3 class="fw-bold my-2">{{__('Award Images')}}<!--end::Heading--></h3>
    </div><!--end::Toolbar-->

    <!--begin::Row-->
    <div class="row g-6 g-xl-9 mb-6 mb-xl-9">
        @foreach(unserialize($award->images) as $image)
        <!--begin::Col-->
        <div class="col-md-6 col-lg-4 col-xl-3">
            <!--begin::Card-->
            <div class="card h-100">
                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                    <!--begin::Name-->
                    <div class="text-gray-800 text-hover-primary d-flex flex-column">
                        <!--begin::Image-->
                        <div class="symbol symbol-100px mb-5">
                            <img src="{{getImagePath($image, 'Awards')}}" alt="{{$award->title}}" />
                        </div>
                    </div><!--end::Name-->
                </div><!--end::Card body-->
            </div><!--end::Card-->
        </div><!--end::Col-->
        @endforeach

    </div><!--end:Row-->
@endsection
