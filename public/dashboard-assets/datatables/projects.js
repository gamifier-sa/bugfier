"use strict";

// Class definition
let KTDatatable = (function () {
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
            order: [[3, "desc"]], // display records number and ordering type
            stateSave: false,
            select: {
                style: "os",
                selector: "td:first-child",
                className: "row-selected",
            },
            ajax: {
                data: function () {
                    let datatable = $("#kt_datatable");
                    let info = datatable.DataTable().page.info();
                    datatable
                        .DataTable()
                        .ajax.url(
                            `/dashboard/projects?page=${
                                info.page + 1
                            }&per_page=${info.length}`
                        );
                },
            },
            columns: [
                // {
                //     data: null,
                //     orderable: false, // Disable ordering on this column
                //     searchable: false, // Disable searching on this column
                //     render: function (data, type, row, meta) {
                //         // 'meta' contains information about the cell position, including row index
                //         return meta.row + 1; // Add 1 to start numbering from 1
                //     },
                // },
                { data: null },
                { data: null },
                { data: null },
                { data: null },
                { data: null },
            ],

            columnDefs: [
                { targets: [-3, -4, -5], searchable: false },
                {
                    render: function (data, type, row, meta) {
                        const currentLanguage =
                            document.documentElement.getAttribute("lang");

                        if (currentLanguage === "en") {
                            return `<td >


<div  class='row flex gap-3 align-items-center my-td-inner rounded-sm'>
<div class='tabel-img'>       <img  src="{{ asset('dashboard-assets\media\project-tabel.png') }}" alt='' class='w-100 h-100' />
        </div>
                        <div class="flex-column tabel-inner d-flex align-items-start justify-content-center j ">
                           <h3>${row.title}</h3>
                           <div class='row flex gap-3'><span class=' text-start' >Project# ${
                               meta.row + 1
                           }    <a href="/dashboard/projects/${
                                row.id
                            }/edit" >  See project details   </a>   iD: ${
                                row.id
                            }</span>       </div>   </div>

</div>

                       </td>`;
                        } else {
                            return `<td >


<div  class='row flex gap-3 align-items-center my-td-inner rounded-sm'>
<div class='tabel-img'>       <img  src="{{ asset('dashboard-assets\media\project-tabel.png') }}" alt='' class='w-100 h-100' />
        </div>
                        <div class="flex-column tabel-inner d-flex align-items-start justify-content-center j ">
                           <h3>${row.title}</h3>
                           <div class='row flex gap-3'><span class=' my-span text-start' >  المشروع #   ${
                               meta.row + 1
                           }    <a href="/dashboard/projects/${
                                row.id
                            }/edit" >   مشاهدة تفاصيل المشروع   </a>   iD:  ${
                                row.id
                            }</span>       </div>   </div>

</div>

                       </td>`;
                        }
                    },
                    targets: [0, 1, 2],
                },
                { visible: false, targets: [1, 2] },

                {
                    targets: -2,
                    data: null,

                    // Update the template literal with the translated string

                    render: function (data, type, row) {
                        const currentLanguage =
                            document.documentElement.getAttribute("lang");

                        if (currentLanguage === "en") {
                            return `<div class='d-flex my-td-inner align-items-center justify-center for-date'>  <h3 class='my-span'> CREATED DATE (<span> ${row.create_since}</span>) </h3> </div>`;
                        } else {
                            return `<div class='d-flex my-td-inner align-items-center justify-center for-date'>  <h3 class='my-span'> تاريخ الإنشاء (<span> ${row.create_since}</span>) </h3> </div>`;
                        }
                    },
                },
                {
                    targets: -1,
                    data: null,
                    render: function (data, type, row) {
                        return `

                                <!--begin::Menu-->
                                <div class="d-flex actions my-td-inner rounded-sm row" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class=" px-3 action-item ">
                                        <a href="/dashboard/projects/${
                                            row.id
                                        }/edit" class=" px-3 d-flex justify-content-between edit-row" >

                                           <span>  <i class="fa fa-edit text-primary"></i> </span>
                                        </a>

                                    </div><!--end::Menu-->
                                       <!--begin::Menu item-->
                                <div class=" px-3 action-item">
                                    <a href="/dashboard/projects/${
                                        row.id
                                    }" class=" px-3 d-flex justify-content-between" >

                                       <span>  <i class="fa fa-eye text-black-50"></i> </span>
                                    </a>

                                </div>
                                <!--end::Menu item-->


                                <div class=" px-3 action-item">
                                    <a href="#" class=" px-3 d-flex justify-content-between delete-row" data-row-id="${
                                        row.id
                                    }" data-type="${translate("Projects")}">

                                        <span>  <i class="fa fa-trash text-danger"></i> </span>
                                    </a>
                                </div><!--end::Menu item-->
                            `;
                    },
                },
            ],
        });

        table = datatable.$;

        datatable.on("draw", function () {
            handleDeleteRows();
            KTMenu.createInstances();
        });
    };

    // general search in datatable
    let handleSearchDatatable = () => {
        $("#general-search-inp").keyup(function () {
            datatable.search("search=" + $(this).val()).draw();
        });
    };

    // Filter Datatable
    let handleFilterDatatable = () => {
        $(".filter-datatable-inp").each((index, element) => {
            $(element).change(function () {
                let columnIndex = $(this).data("filter-index"); // index of the searching column

                datatable.column(columnIndex).search($(this).val()).draw();
            });
        });
    };

    // Delete record
    let handleDeleteRows = () => {
        $(".delete-row").click(function () {
            let rowId = $(this).data("row-id");
            let type = $(this).data("type");

            deleteAlert(type).then(function (result) {
                if (result.value) {
                    loadingAlert(translate("deleting now ..."));

                    $.ajax({
                        method: "delete",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        url: "/dashboard/projects/" + rowId,
                        success: () => {
                            setTimeout(() => {
                                successAlert(
                                    `${
                                        translate("You have deleted the") +
                                        " " +
                                        type +
                                        " " +
                                        translate("successfully !")
                                    } `
                                ).then(function () {
                                    datatable.draw();
                                });
                            }, 1000);
                        },
                        error: (err) => {
                            if (err.hasOwnProperty("responseJSON")) {
                                if (
                                    err.responseJSON.hasOwnProperty("message")
                                ) {
                                    errorAlert(err.responseJSON.message);
                                }
                            }
                        },
                    });
                } else if (result.dismiss === "cancel") {
                    errorAlert(translate("was not deleted !"));
                }
            });
        });
    };

    // Public methods
    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();
            // handleFilterDatatable();
        },
    };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatable.init();
});
