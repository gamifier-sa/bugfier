<!DOCTYPE html>
<html lang="{{ getLocale() }}" direction="{{ isArabic() ? 'rtl' : 'ltr' }}" style="direction:{{ getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<!--begin::Head-->
@include('dashboard.auth.layouts.head')
<!--end::Head-->
<!--begin::Body-->
<body class="bg-dark">

<div class="d-flex flex-column flex-root">
    <!--begin::Page bg image-->
    <style>body { background-image: url('{{ asset("dashboard-assets/media/auth/bg10.jpeg") }}'); } [data-theme="dark"] body { background-image: url('{{asset('dashboard-assets/media/auth/bg10-dark.jpeg')}}'); }</style>
    <!--end::Page bg image-->
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid justify-content-center ">
    @include('dashboard.auth.layouts.aside')

    @yield('content')



    </div>
    <!--end::Authentication - Sign-in-->
</div>

<!--begin::Javascript-->
@include('dashboard.auth.layouts.foot')
<!--end::Javascript-->

</body>
<!--end::Body-->
</html>
