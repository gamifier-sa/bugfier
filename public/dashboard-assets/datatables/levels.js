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
            order: [[4, "desc"]], // display records number and ordering type
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
                            `/dashboard/levels?page=${info.page + 1}&per_page=${
                                info.length
                            }`
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
                //     }
                // },
                { data: null },
                { data: null },
                { data: null },
                { data: "create_since" },
                { data: "exp" },
                { data: null },
            ],
            columnDefs: [
                { targets: [-4, -5, -6], searchable: false },
                {
                    render: function (data, type, row, meta) {
                        return `<td> <div class='d-flex my-td-inner align-items-center justify-center for-date'>


                           <h3> <span> # ${meta.row + 1}   </span>   ${
                            row.name
                        } <span>(id:${row.id})</span></h3>


</div>

                       </td>`;
                    },
                    targets: [0, 1, 2],
                },
                { visible: false, targets: [1, 0] },

                {
                    targets: -3,
                    data: null,
                    render: function (data, type, row) {
                        return `<td> <div class='d-flex my-td-inner align-items-center justify-center for-date'>  <h3>   ${row.create_since} </h3> </div>   </td>`;
                    },
                },

                {
                    targets: -2,
                    data: null,
                    render: function (data, type, row) {
                        return `<td> <div class='d-flex my-td-inner align-items-center justify-center for-date'>  <h3>   ${row.exp} </h3> </div>   </td>`;
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
                                        <a href="/dashboard/levels/${
                                            row.id
                                        }/edit"  class=" px-3 d-flex justify-content-between edit-row" >

                                           <span>  <i class="fa fa-edit text-primary"></i> </span>
                                        </a>

                                    </div><!--end::Menu-->


                                <div class=" px-3 action-item">
                                    <a href="#" class="menu-link px-3 d-flex justify-content-between delete-row" data-row-id="${
                                        row.id
                                    }" data-type="${translate("level")}">

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
                        url: "/dashboard/levels/" + rowId,
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
