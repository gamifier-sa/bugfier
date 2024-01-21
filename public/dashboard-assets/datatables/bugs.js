"use strict";

// Class definition
let KTDatatable = function () {

    // Shared variables
    let table;
    let datatable;
    let filter;

    // Private functions
    let initDatatable = function () {
        datatable = $("#kt_datatable").DataTable({
            orderable: false,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[6, 'desc']], // display records number and ordering type
            stateSave: true,
            select: {
                style: 'os',
                selector: 'td:first-child',
                className: 'row-selected'
            },
            ajax: {
                data: function () {
                    let datatable = $('#kt_datatable');
                    let info = datatable.DataTable().page.info();
                    datatable.DataTable().ajax.url(`/dashboard/bugs?page=${info.page + 1}&per_page=${info.length}`);
                }
            },
            columns: [
                {
                    data: null,
                    orderable: false, // Disable ordering on this column
                    searchable: false, // Disable searching on this column
                    render: function (data, type, row, meta) {
                        // 'meta' contains information about the cell position, including row index
                        return meta.row + 1; // Add 1 to start numbering from 1
                    }
                },
                {data: 'id'},
                {data: 'title'},
                {data: 'project.title'},
                {data: 'admin.full_name'},
                {data: 'point'},
                {data: 'status.title'},
                {data: 'create_since'},
                {data: null},
            ],
            columnDefs: [
                {
                    targets: -1,
                    data: null,
                    render: function (data, type, row) {
                        if (authorizationUpdateExp)
                        {
                            return `
                             <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                 ${translate('Actions')}
                                 <span class="svg-icon svg-icon-5 m-0">
                                     <i class="fa fa-angle-down mx-1"></i>
                                 </span>
                             </a>
                             <!--begin::Menu-->
                             <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                             <!--begin::Menu item-->
                             <div class="menu-item px-3">
                                 <a href="/dashboard/bugs/${ row.id }/edit" class="menu-link px-3 d-flex justify-content-between edit-row" >
                                    <span> ${translate('Edit')} </span>
                                    <span>  <i class="fa fa-edit text-primary"></i> </span>
                                 </a>

                             </div><!--end::Menu-->

                             <!--begin::Menu item-->
                             <div class="menu-item px-3">
                                 <a href="/dashboard/bugs-update-exp/${ row.id }/edit" class="menu-link px-3 d-flex justify-content-between edit-row" >
                                    <span> ${translate('Update Experience')} </span>
                                    <span>  <i class="fa fa-edit text-primary"></i> </span>
                                 </a>

                             </div><!--end::Menu-->

                            <!--begin::Menu item-->
                             <div class="menu-item px-3">
                                 <a href="/dashboard/bugs/${ row.id }" class="menu-link px-3 d-flex justify-content-between" >
                                    <span> ${translate('Show')} </span>
                                    <span>  <i class="fa fa-eye text-black-50"></i> </span>
                                 </a>

                             </div>
                             <!--end::Menu item-->


                             <div class="menu-item px-3">
                                 <a href="#" class="menu-link px-3 d-flex justify-content-between delete-row" data-row-id="${row.id}" data-type="${translate('Bugs')}">
                                     <span> ${translate('Delete')} </span>
                                     <span>  <i class="fa fa-trash text-danger"></i> </span>
                                 </a>
                             </div><!--end::Menu item-->
                         `;
                        } else {
                            return `
                             <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                 ${translate('Actions')}
                                 <span class="svg-icon svg-icon-5 m-0">
                                     <i class="fa fa-angle-down mx-1"></i>
                                 </span>
                             </a>
                             <!--begin::Menu-->
                             <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                             <!--begin::Menu item-->
                             <div class="menu-item px-3">
                                 <a href="/dashboard/bugs/${ row.id }/edit" class="menu-link px-3 d-flex justify-content-between edit-row" >
                                    <span> ${translate('Edit')} </span>
                                    <span>  <i class="fa fa-edit text-primary"></i> </span>
                                 </a>

                             </div><!--end::Menu-->



                            <!--begin::Menu item-->
                             <div class="menu-item px-3">
                                 <a href="/dashboard/bugs/${ row.id }" class="menu-link px-3 d-flex justify-content-between" >
                                    <span> ${translate('Show')} </span>
                                    <span>  <i class="fa fa-eye text-black-50"></i> </span>
                                 </a>

                             </div>
                             <!--end::Menu item-->


                             <div class="menu-item px-3">
                                 <a href="#" class="menu-link px-3 d-flex justify-content-between delete-row" data-row-id="${row.id}" data-type="${translate('Bugs')}">
                                     <span> ${translate('Delete')} </span>
                                     <span>  <i class="fa fa-trash text-danger"></i> </span>
                                 </a>
                             </div><!--end::Menu item-->
                         `;
                        }
                        // if (authorizationUpdate && authorizationDelete && authorizationShow) {
                        //     return `
                        //         <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                        //             ${translate('Actions')}
                        //             <span class="svg-icon svg-icon-5 m-0">
                        //                 <i class="fa fa-angle-down mx-1"></i>
                        //             </span>
                        //         </a>
                        //         <!--begin::Menu-->
                        //         <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                        //             <!--begin::Menu item-->
                        //             <div class="menu-item px-3">
                        //                 <a href="/dashboard/bugs/${ row.id }/edit" class="menu-link px-3 d-flex justify-content-between edit-row" >
                        //                    <span> ${translate('Edit')} </span>
                        //                    <span>  <i class="fa fa-edit text-primary"></i> </span>
                        //                 </a>
                        //
                        //             </div><!--end::Menu-->
                        //                <!--begin::Menu item-->
                        //         <div class="menu-item px-3">
                        //             <a href="/dashboard/bugs/${ row.id }" class="menu-link px-3 d-flex justify-content-between" >
                        //                <span> ${translate('Show')} </span>
                        //                <span>  <i class="fa fa-eye text-black-50"></i> </span>
                        //             </a>
                        //
                        //         </div>
                        //         <!--end::Menu item-->
                        //
                        //
                        //         <div class="menu-item px-3">
                        //             <a href="#" class="menu-link px-3 d-flex justify-content-between delete-row" data-row-id="${row.id}" data-type="${translate('Bugs')}">
                        //                 <span> ${translate('Delete')} </span>
                        //                 <span>  <i class="fa fa-trash text-danger"></i> </span>
                        //             </a>
                        //         </div><!--end::Menu item-->
                        //     `;
                        // }
                        //
                        // if (authorizationDelete && authorizationShow) {
                        //     return `
                        //         <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                        //             ${translate('Actions')}
                        //             <span class="svg-icon svg-icon-5 m-0">
                        //                 <i class="fa fa-angle-down mx-1"></i>
                        //             </span>
                        //         </a>
                        //         <!--begin::Menu-->
                        //         <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                        //
                        //                <!--begin::Menu item-->
                        //         <div class="menu-item px-3">
                        //             <a href="/dashboard/bugs/${ row.id }" class="menu-link px-3 d-flex justify-content-between" >
                        //                <span> ${translate('Show')} </span>
                        //                <span>  <i class="fa fa-eye text-black-50"></i> </span>
                        //             </a>
                        //
                        //         </div>
                        //         <!--end::Menu item-->
                        //
                        //
                        //         <div class="menu-item px-3">
                        //             <a href="#" class="menu-link px-3 d-flex justify-content-between delete-row" data-row-id="${row.id}" data-type="${translate('Bugs')}">
                        //                 <span> ${translate('Delete')} </span>
                        //                 <span>  <i class="fa fa-trash text-danger"></i> </span>
                        //             </a>
                        //         </div><!--end::Menu item-->
                        //     `;
                        // }
                        //
                        // if (authorizationUpdate && authorizationShow) {
                        //     return `
                        //         <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                        //             ${translate('Actions')}
                        //             <span class="svg-icon svg-icon-5 m-0">
                        //                 <i class="fa fa-angle-down mx-1"></i>
                        //             </span>
                        //         </a>
                        //         <!--begin::Menu-->
                        //         <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                        //             <!--begin::Menu item-->
                        //             <div class="menu-item px-3">
                        //                 <a href="/dashboard/bugs/${ row.id }/edit" class="menu-link px-3 d-flex justify-content-between edit-row" >
                        //                    <span> ${translate('Edit')} </span>
                        //                    <span>  <i class="fa fa-edit text-primary"></i> </span>
                        //                 </a>
                        //
                        //             </div><!--end::Menu-->
                        //                <!--begin::Menu item-->
                        //         <div class="menu-item px-3">
                        //             <a href="/dashboard/bugs/${ row.id }" class="menu-link px-3 d-flex justify-content-between" >
                        //                <span> ${translate('Show')} </span>
                        //                <span>  <i class="fa fa-eye text-black-50"></i> </span>
                        //             </a>
                        //
                        //         </div>
                        //         <!--end::Menu item-->
                        //     `;
                        // }
                        //
                        // if (authorizationUpdate && authorizationDelete) {
                        //     return `
                        //         <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                        //             ${translate('Actions')}
                        //             <span class="svg-icon svg-icon-5 m-0">
                        //                 <i class="fa fa-angle-down mx-1"></i>
                        //             </span>
                        //         </a>
                        //         <!--begin::Menu-->
                        //         <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                        //             <!--begin::Menu item-->
                        //             <div class="menu-item px-3">
                        //                 <a href="/dashboard/bugs/${ row.id }/edit" class="menu-link px-3 d-flex justify-content-between edit-row" >
                        //                    <span> ${translate('Edit')} </span>
                        //                    <span>  <i class="fa fa-edit text-primary"></i> </span>
                        //                 </a>
                        //
                        //             </div><!--end::Menu-->
                        //
                        //         <div class="menu-item px-3">
                        //             <a href="#" class="menu-link px-3 d-flex justify-content-between delete-row" data-row-id="${row.id}" data-type="${translate('Bugs')}">
                        //                 <span> ${translate('Delete')} </span>
                        //                 <span>  <i class="fa fa-trash text-danger"></i> </span>
                        //             </a>
                        //         </div><!--end::Menu item-->
                        //     `;
                        // }
                        //
                        // if (authorizationUpdate) {
                        //     return `
                        //         <!--begin::Menu item-->
                        //         <div class="btn btn-light btn-active-light-primary btn-sm">
                        //             <a href="/dashboard/bugs/${ row.id }/edit" class="menu-link px-3 d-flex edit-row" >
                        //                <span> ${translate('Edit')} </span>
                        //             </a>
                        //         </div><!--end::Menu-->
                        //     `;
                        // }
                        //
                        // if (authorizationShow) {
                        //     return `
                        //         <!--begin::Menu item-->
                        //         <div class="btn btn-light btn-active-light-primary btn-sm">
                        //             <a href="/dashboard/bugs/${ row.id }" class="menu-link px-3 d-flex justify-content-between" >
                        //                <span> ${translate('Show')} </span>
                        //             </a>
                        //         </div><!--end::Menu-->
                        //     `;
                        // }
                        //
                        // if (authorizationDelete) {
                        //     return `
                        //         <div class="btn btn-light-danger btn-active-light-danger btn-sm">
                        //             <a href="#" class="menu-link px-3 d-flex justify-content-between delete-row" data-row-id="${row.id}" data-type="${translate('Bug')}">
                        //                 <span class="text-danger"> ${translate('Delete')} </span>
                        //             </a>
                        //         </div><!--end::Menu item-->
                        //     `;
                        // }
                        //
                        // return `
                        //     <div class="text-center px-3">
                        //         <span> ${translate('There are no permissions')} </span>
                        //     </div>
                        // `;
                    },
                },
            ],

        });

        table = datatable.$;

        datatable.on('draw', function () {
            handleDeleteRows();
            KTMenu.createInstances();
        });
    }

    // general search in datatable
    let handleSearchDatatable = () => {

        $('#general-search-inp').keyup( function () {
            datatable.search('search='+$(this).val() ).draw();
        });

    }

    let handleFilterDatatable = () => {
        // Select filter options
        const filterForm = document.querySelector('[data-kt-docs-table-filter="form"]');
        const filterButton = filterForm.querySelector('[data-kt-docs-table-filter="filter"]');
        const selectOptions = filterForm.querySelectorAll('select');

        // Filter datatable on submit
        filterButton.addEventListener('click', function () {
            let filterString = '';

            // Get filter values
            selectOptions.forEach((item, index) => {
                if (item.value && item.value !== '') {
                    if (index !== 0) {
                        filterString += ',';
                    }

                    // Build filter value options
                    filterString += item.name + '=' + item.value;
                }
            });


            datatable.search(filterString).draw();
        });
    }

    // Reset Filter
    let handleResetForm = () => {
        // Select reset button
        const resetButton = document.querySelector('[data-kt-docs-table-filter="reset"]');

        // Reset datatable
        resetButton.addEventListener('click', function () {
            // Select filter options
            const filterForm = document.querySelector('[data-kt-docs-table-filter="form"]');
            const selectOptions = filterForm.querySelectorAll('select');

            // Reset select2 values -- more info: https://select2.org/programmatic-control/add-select-clear-items
            selectOptions.forEach(select => {
                $(select).val('').trigger('change');
            });

            // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
            datatable.search('').draw();
        });
    }



    // Delete record
    let handleDeleteRows = () => {

        $('.delete-row').click(function () {

            let rowId = $(this).data('row-id');
            let type  = $(this).data('type');

            deleteAlert(type).then(function (result) {

                if (result.value) {

                    loadingAlert(translate('deleting now ...'));

                    $.ajax({
                        method: 'delete',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: '/dashboard/bugs/' + rowId,
                        success: () => {

                            setTimeout( () => {

                                successAlert(`${translate('You have deleted the') + ' ' + type + ' ' + translate('successfully !')} `)
                                    .then(function () {
                                        datatable.draw();
                                    });

                            } , 1000)



                        },
                        error: (err) => {

                            if (err.hasOwnProperty('responseJSON')) {
                                if (err.responseJSON.hasOwnProperty('message')) {
                                    errorAlert(err.responseJSON.message);
                                }
                            }
                        }
                    });


                } else if (result.dismiss === 'cancel') {

                    errorAlert( translate('was not deleted !') )

                }
            });
        })
    }


    // Public methods
    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();
            handleFilterDatatable();
            handleResetForm();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatable.init();
});
