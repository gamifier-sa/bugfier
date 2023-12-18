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
                    datatable.DataTable().ajax.url(`/dashboard/invoices?page=${info.page + 1}&per_page=${info.length}`);
                }
            },
            columns: [
                {data: 'id'},
                {data: null},
                {data: 'total_price'},
                {data: 'serial_no'},
                {data: 'barcode'},
                {data: null},
                {data: null},
                {data: 'create_since'},
                {data: null},
            ],
            columnDefs: [
                {
                    targets: 1,
                    data: null,
                    render: function (data, type, row) {
                        return data.patient.full_name;
                    }
                },
                {
                    targets: -4,
                    data: null,
                    render: function (data, type, row) {
                        if(row.status === 1)
                        {
                            return `<span class="badge badge-light-success">${translate('Success')}</span>`;
                        } else if (row.status === 2)
                        {
                            return `<span class="badge badge-light-danger">${translate('Discarded')}</span>`;
                        }

                    },
                },{
                    targets: -4,
                    data: null,
                    render: function (data, type, row) {
                        if(row.status === 1)
                        {
                            return `<span class="badge badge-light-success">${translate('Success')}</span>`;
                        } else if (row.status === 2)
                        {
                            return `<span class="badge badge-light-danger">${translate('Discarded')}</span>`;
                        }

                    },
                },
                {
                    targets: -3,
                    data: null,
                    render: function (data, type, row) {
                        if(row.pay_method === 1) {
                            return `<span class="badge badge-light-warning">${translate('Cash')}</span>`;
                        } else if (row.pay_method === 2) {
                            return `<span class="badge badge-light-success">${translate('Credit')}</span>`;
                        } else if (row.pay_method === 3) {
                            return `<span class="badge badge-light-danger">${translate('Overdue')}</span>`;
                        }

                    },
                },
                {
                    targets: -1,
                    data: null,
                    render: function (data, type, row) {
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
                                    <a href="/dashboard/invoices/${ row.id }" class="menu-link px-3 d-flex justify-content-between" >
                                       <span> ${translate('Show Invoice')} </span>
                                       <span>  <i class="fa fa-eye text-black-50"></i> </span>
                                    </a>
                                </div><!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 d-flex justify-content-between delete-row" data-row-id="${row.id}" data-type="${translate('invoices')}">
                                        <span> ${translate('Delete')} </span>
                                        <span>  <i class="fa fa-trash text-danger"></i> </span>
                                    </a>
                                </div><!--end::Menu item-->
                            </div><!--end::Menu-->
                        `;
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
                        url: '/dashboard/main-analysis/' + rowId,
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
