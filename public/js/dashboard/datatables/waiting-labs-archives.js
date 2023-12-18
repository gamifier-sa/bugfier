"use strict";

// Class definition
let KTDatatable = function () {

    // Shared variables
    let table;
    let datatable;
    let filter;

    var url_string   =  window.location.href;
    var url          =  new URL(url_string);
    var PAITiENT_ID  =  url.searchParams.get("patient");
    var STATUS       =  url.searchParams.get("status");
    var FROMDATE     =  url.searchParams.get("from_date");
    var TODATE       =  url.searchParams.get("to_date");



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
                    if(FROMDATE || TODATE){
                        datatable.DataTable().ajax.url(`/dashboard/waiting-labs-archives?page=${info.page + 1}&per_page=${info.length}&from_date=${FROMDATE}&to_date=${TODATE}`);
                    }else{
                        datatable.DataTable().ajax.url(`/dashboard/waiting-labs-archives?page=${info.page + 1}&per_page=${info.length}`);
                    }
                }
            },
            columns: [
                {data: 'id'},
                {data:null},
                {data:null},
                {data:null},
                {data:null},
                {data: 'status'},
                {data: 'created_at'},
                {data: null},
            ],
            columnDefs: [
                {
                    targets: 1,
                    data: null,
                    render: function (data, type, row) {

                        return `<a href="/dashboard/waiting-labs?patient=${row.patient.id}" style="color:#5b0efa;"> ${row.patient.name_ar} </a>`;

                    },
                },

                {
                    targets: 2,
                    data: null,
                    render: function (data, type, row) {

                        return row.main_analysis.general_name;
                    },
                },
                {
                    targets: 3,
                    data: null,
                    render: function (data, type, row) {

                        return row.invoice.serial_no;
                    },
                },
                {
                    targets: 4,
                    data: null,
                    render: function (data, type, row) {

                        return row.invoice.barcode;
                    },
                },
                {
                    targets: 5,
                    data: null,
                    render: function (data, type, row) {
                        if(data === 1){

                            return `<span style="background: #d2061e;padding: 0px 4px; color: #ffff; border-radius: 8px;">${translate('Pending')}</span>`;
                        }else{
                            return `<span style="background: #1dc9b7;padding: 0px 4px; color: #ffff; border-radius: 8px;">${translate('Finished')}</span>`;
                        }
                     },
                },


                {
                    targets: 6,
                    data: null,
                    render: function (data, type, row) {
                        if(data === 1){

                            return '<span style="color:#d2061e;"> Hide <i class="fa-solid fa-reply" style="color:#d2061e"> </i> </span>';
                        }else{
                            return '<span style="color:#1dc9b7;"> Hide <i class="fa-solid fa-reply" style="color:#1dc9b7"> </i> </span>';
                        }
                     },
                },


                {
                    targets: -1,
                    data: null,
                    render: function (data, type, row) {

                        if(row.status == 2){
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
                                    <a href="/dashboard/results/${ row.id }/edit" class="menu-link px-3 d-flex justify-content-between edit-row" >
                                       <span> ${translate('Edit Result')} </span>
                                       <span>  <i class="fa fa-edit text-primary"></i> </span>
                                    </a>

                                </div>
                                <!--end::Menu item-->

                            </div>
                            <!--end::Menu-->
                        `;
                        }else{
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
                                <a href="/dashboard/results/create?waitingLabId=${row.id}" class="menu-link px-3 d-flex justify-content-between edit-row" >
                                   <span> ${translate('Create Result')} </span>
                                   <span>  <i class="fa fa-edit text-primary"></i> </span>
                                </a>

                            </div>
                            <!--end::Menu item-->

                        </div>
                        <!--end::Menu-->
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
                        url: '/dashboard/waiting-labs/' + rowId,
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
