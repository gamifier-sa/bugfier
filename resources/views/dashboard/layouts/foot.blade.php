<script>
    let imagesBasePath  = "{{ asset('/storage/Images') }}";
    let locale          = "{{ getLocale() }}";
    let ordersStatuses  = @json( settings()->get('orders_statuses') );
</script>
<script src="{{asset('dashboard-assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('dashboard-assets/js/scripts.bundle.js')}}"></script>
<script src="{{asset('js/dashboard/translations.js')}}"></script>
<script src="{{asset('js/dashboard/global_scripts.js')}}"></script>
@stack('scripts')
