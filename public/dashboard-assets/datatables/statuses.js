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
            order: [[4, 'desc']], // display records number and ordering type
            stateSave: false,
            select: {
                style: 'os',
                selector: 'td:first-child',
                className: 'row-selected'
            },
            ajax: {
                data: function () {
                    let datatable = $('#kt_datatable');
                    let info = datatable.DataTable().page.info();
                    datatable.DataTable().ajax.url(`/dashboard/statuses?page=${info.page + 1}&per_page=${info.length}`);
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
                {data: 'create_since'},
                {data: null},
                {data: null},
            ],
            columnDefs: [
                {
                    targets: -2,
                    data: null,
                    render: function (data, type, row) {
                        if(row.is_default === 1) {
                            return `
                                <svg class="theme-light-show" width="24" height="24" viewBox="0 0 24 24" fill="success" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill="dark"/>
                                    <path d="M10.5799 15.58C10.3799 15.58 10.1899 15.5 10.0499 15.36L7.21994 12.53C6.92994 12.24 6.92994 11.76 7.21994 11.47C7.50994 11.18 7.98994 11.18 8.27994 11.47L10.5799 13.77L15.7199 8.62998C16.0099 8.33998 16.4899 8.33998 16.7799 8.62998C17.0699 8.91998 17.0699 9.39998 16.7799 9.68998L11.1099 15.36C10.9699 15.5 10.7799 15.58 10.5799 15.58Z" fill="dark"/>
                                </svg>
                                 <svg class="theme-dark-show" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill="white"/>
                                    <path d="M10.5799 15.58C10.3799 15.58 10.1899 15.5 10.0499 15.36L7.21994 12.53C6.92994 12.24 6.92994 11.76 7.21994 11.47C7.50994 11.18 7.98994 11.18 8.27994 11.47L10.5799 13.77L15.7199 8.62998C16.0099 8.33998 16.4899 8.33998 16.7799 8.62998C17.0699 8.91998 17.0699 9.39998 16.7799 9.68998L11.1099 15.36C10.9699 15.5 10.7799 15.58 10.5799 15.58Z" fill="white"/>
                                </svg>
                            `;
                        }  else {
                            return `
                            <svg class="theme-dark-show" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.92 22C17.42 22 21.92 17.5 21.92 12C21.92 6.5 17.42 2 11.92 2C6.42004 2 1.92004 6.5 1.92004 12C1.92004 17.5 6.42004 22 11.92 22Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path opacity="0.34" d="M7.92004 12H15.92" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                             <svg class="theme-light-show" width="24" height="24" viewBox="0 0 24 24" fill="dark" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.92 22C17.42 22 21.92 17.5 21.92 12C21.92 6.5 17.42 2 11.92 2C6.42004 2 1.92004 6.5 1.92004 12C1.92004 17.5 6.42004 22 11.92 22Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path opacity="0.34" d="M7.92004 12H15.92" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            `;
                        }
                    }
                },

                {
                    targets: -1,
                    data: null,
                    render: function (data, type, row) {
                        if(row.is_default === 1) {
                            if (authorizationUpdate) {
                                return `
                                <!--begin::Menu item-->
                                <div class="btn btn-light btn-active-light-primary btn-sm">
                                    <a href="/dashboard/statuses/${ row.id }/edit" class="menu-link px-3 d-flex edit-row" >
                                       <span> ${translate('Edit')} </span>
                                    </a>
                                </div><!--end::Menu-->
                            `;
                            }

                            return `
                            <div class="text-center px-3">
                                <span> ${translate('There are no permissions')} </span>
                            </div>
                        `;
                        } else {
                            if (authorizationUpdate && authorizationDelete) {
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
                                        <a href="/dashboard/statuses/${ row.id }/edit" class="menu-link px-3 d-flex justify-content-between edit-row" >
                                           <span> ${translate('Edit')} </span>
                                           <span>  <i class="fa fa-edit text-primary"></i> </span>
                                        </a>

                                    </div><!--end::Menu-->

                                    <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 d-flex justify-content-between delete-row" data-row-id="${row.id}" data-type="${translate('Status')}">
                                        <span> ${translate('Delete')} </span>
                                        <span>  <i class="fa fa-trash text-danger"></i> </span>
                                    </a>
                                </div><!--end::Menu item-->
                            `;
                            }

                            if (authorizationUpdate) {
                                return `
                                <!--begin::Menu item-->
                                <div class="btn btn-light btn-active-light-primary btn-sm">
                                    <a href="/dashboard/statuses/${ row.id }/edit" class="menu-link px-3 d-flex edit-row" >
                                       <span> ${translate('Edit')} </span>
                                    </a>
                                </div><!--end::Menu-->
                            `;
                            }
                            if (authorizationDelete) {
                                return `
                                <div class="btn btn-light-danger btn-active-light-danger btn-sm">
                                    <a href="#" class="menu-link px-3 d-flex justify-content-between delete-row" data-row-id="${row.id}" data-type="${translate('Status')}">
                                        <span class="text-danger"> ${translate('Delete')} </span>
                                    </a>
                                </div><!--end::Menu item-->
                            `;
                            }

                            return `
                            <div class="text-center px-3">
                                <span> ${translate('There are no permissions')} </span>
                            </div>
                        `;
                        }
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
            datatable.search( $(this).val() ).draw();
        });

    }

    // Filter Datatable
    let handleFilterDatatable = () => {

        $('.filter-datatable-inp').each( (index , element) =>  {

            $(element).change( function () {

                let columnIndex = $(this).data('filter-index'); // index of the searching column

                datatable.column(columnIndex).search( $(this).val()).draw();
            });

        })
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
                        url: '/dashboard/statuses/' + rowId,
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
            // handleFilterDatatable();


        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatable.init();
});
