"use strict";

// Class definition
let KTDatatable = function () {

    // Shared variables
    let table;
    let datatable;

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
                    datatable.DataTable().ajax.url(`/patients/invoices?page=${info.page + 1}&per_page=${info.length}`);
                }
            },
            columns: [
                {data: 'id'},
                {data: 'total_price'},
                {data: 'serial_no'},
                {data: 'barcode'},
                {data: null},
                {data: null},
                {data: 'create_since'},
            ],
            columnDefs: [
                {
                    targets: -3,
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
                    targets: -2,
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

            ],

        });

        table = datatable.$;
        datatable.on('draw', function () {
            KTMenu.createInstances();
        });
    }

    // Public methods
    return {
        init: function () {
            initDatatable();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatable.init();
});
