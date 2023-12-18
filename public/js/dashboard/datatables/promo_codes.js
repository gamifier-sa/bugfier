"use strict";

let table;
let datatable;

function getType() {
    return $('#type_inp').val();
}

let partPathName = getType();


let isMarketer = () => getType() === 1;

// Class definition
// Class definition
let KTDatatable = function () {

    // Shared variables
    let filter;

    // Private functions
    let initDatatable = function () {
        console.log(isMarketer())
        datatable = $("#kt_datatable").DataTable({
            destroy: true,
            orderable: false,
            searchDelay: 500,
            processing: true,
            autoWidth: false,
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
                    partPathName = getType();
                    datatable.DataTable().ajax.url(`/dashboard/promoCode?type=${partPathName}&page=${info.page + 1}&per_page=${info.length}`);
                }
            },
            columns: [
                {data: 'id'},
                {data:  null},
                {data:  null},
                {data: 'code'},
                {data: 'from',  defaultContent: `<i>${translate('Not set')}</i>`},
                {data: 'to',   defaultContent: `<i>${translate('Not set')}</i>`},
                {data: 'status'},
                {data: 'create_since'},
                {data: null},
            ],
            columnDefs: [
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
                                    <a href="/dashboard/promoCode/${ row.id }/edit" class="menu-link px-3 d-flex justify-content-between edit-row" >
                                       <span> ${translate('Edit')} </span>
                                       <span>  <i class="fa fa-edit text-primary"></i> </span>
                                    </a>

                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item
                                <div class="menu-item px-3">
                                    <a href="/dashboard/promoCode/${ row.id }" class="menu-link px-3 d-flex justify-content-between" >
                                       <span> ${translate('Show')} </span>
                                       <span>  <i class="fa fa-eye text-black-50"></i> </span>
                                    </a>
                                </div>
                                end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 d-flex justify-content-between delete-row" data-row-id="${row.id}" data-type="${translate('promo code')}">
                                        <span> ${translate('Delete')} </span>
                                        <span>  <i class="fa fa-trash text-danger"></i> </span>
                                    </a>
                                </div>
                                <!--end::Menu item-->

                            </div>
                            <!--end::Menu-->
                        `;
                    },
                },
                {
                    targets:  6,
                    data: 'status',
                    render: function (data, type, row) {
                        let from = new Date(row.from);
                        let to = new Date(row.to);
                        let today = new Date();
                        let result = (today > from && today < to) ? 2 : 1;

                        if (partPathName== 2 && (row.from === null || row.to === null)){
                            result = 2;
                        }

                        let status = {
                            1: {'title': translate('Not Activated'), 'class': 'badge-light-danger'},
                            2: {'title': translate('Activated'), 'class': 'badge-light-primary'},
                        };
                        return '<span class="badge  ' + status[result].class + ' badge--inline badge--pill">' + status[result].title + '</span>';
                    }
                },
                 {
                    targets: 1,
                    data: null,
                     name: 'marketers.name',
                    render: function (data, type, row) {
                        if ( partPathName== 1  && data.marketer !== undefined)
                            return data.marketer.name;
                        else
                            return '';
                    }
                },

                {
                    targets: 2,
                    data: null,
                    render: function (data, type, row) {
                        if (partPathName == 2  && data.user !== undefined) {
                            if (locale === 'ar') return data.user.name_ar;
                            return data.user.name_en;
                        }
                        else
                            return '';
                    }
                }
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
                        url: '/dashboard/promoCode/'+ rowId,
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

function toggleVisibleColumn() {
    if (!isMarketer()) {
        datatable.column(2).visible(false);
        datatable.column(1).visible(false);
    } else {
        datatable.column(1).visible(true);
        datatable.column(2).visible(false);

    }
}
// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatable.init();
    toggleVisibleColumn();
});


let typeOptions = $('#type_inp')
typeOptions.on('change', function () {
    partPathName = $(this).val()

    switch ($(this).val()){
        case '0':
            datatable.column(1).visible(false);
            datatable.column(2).visible(false);

            break
        case '1':
            datatable.column(1).visible(true);
            datatable.column(2).visible(false);

            break
        case '2':
            datatable.column(1).visible(false);
            datatable.column(2).visible(true);

            break
    }
    datatable.ajax.reload()

})
$('#partPathName').change(function () {

    datatable.ajax.reload()

    toggleVisibleColumn();
});
