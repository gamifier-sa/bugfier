@extends('dashboard.layouts.master')
@section('title') {{__("Show bug")}} @endsection

@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.bugs.index') }}" class="text-muted text-hover-primary">{{ __("Bugs") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Show Bug')}}</li><!-- end   :: Item -->
    @endcomponent

    <div class="card mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="card-body">
            <div class="card card-bordered">
                <div class="card-header">
                    <h3 class="card-title">{{ $bug->title }}</h3>
                    <div class="card-toolbar">
                        <a type="button" href="{{ route('dashboard.bugs.edit', $bug->id) }}" class="btn btn-sm btn-light">
                            Edit
                        </a>
                    </div>
                </div>  
                <div class="card-body">
                    {!! $bug->description !!}
                </div>
                <div class="card-footer">
                    @forelse (unserialize($bug->images) as $image)
                        <img src="{{ getImagePath( $image , 'Bugs') }}" alt="..." class="img-thumbnail" width="300px">

                    @empty
                        <p>No Images</p>
                    @endforelse
                    
                </div>
            </div>
        </div><!-- end   :: Card body -->
    </div>
@endsection


