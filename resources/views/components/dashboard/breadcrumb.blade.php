<!-- begin :: Subheader -->
<div class="toolbar">
    <div class=" d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            {{ $breadcrumb_title ?? '' }}
            <!-- begin :: Separator -->
            <span class="h-20px border-gray-300 border-start mx-4"></span><!-- end   :: Separator -->

            <!-- begin :: Breadcrumb -->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                {{ $slot ?? '' }}
            </ul><!-- end   :: Breadcrumb -->
        </div>
    </div>
</div><!-- end   :: Subheader -->
