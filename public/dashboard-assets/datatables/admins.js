"use strict";

// Class definition
let KTDatatable = (function () {
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
                            `/dashboard/admins?page=${info.page + 1}&per_page=${
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
                //     },
                // },
                { data: null },
                { data: null },
                { data: "full_name" },
                { data: null },
                { data: "email" },
                { data: null },
                { data: null },
                { data: null },
                { data: null },
            ],
            columnDefs: [
                { targets: [-7, -8, -9], searchable: false },
                {
                    render: function (data, type, row, meta) {
                        return `<td> <div class='d-flex my-td-inner align-items-center justify-center for-date'>


                           <h3> <span> # ${meta.row + 1}   </span>   ${
                            row.full_name
                        } <span>(id:${row.id})</span></h3>


</div>

                       </td>`;
                    },
                    targets: [0, 1, 2],
                },
                { visible: false, targets: [1, 0] },

                {
                    targets: -6,
                    data: null,
                    render: function (data, type, row) {
                        return `<td> <div class='d-flex my-td-inner align-items-center justify-center for-date'>  <h3>   ${row.phone} </h3> </div>   </td>`;
                    },
                },
                {
                    targets: -5,
                    data: null,
                    render: function (data, type, row) {
                        return `<td> <div class='d-flex my-td-inner align-items-center justify-center for-date'>  <h3>  ${row.email} </h3> </div>   </td>`;
                    },
                },
                {
                    targets: -3,
                    data: null,
                    render: function (data, type, row) {
                        if (row.level)
                            return `
                         <td> <div class='d-flex my-td-inner align-items-center justify-center for-date'>  <h3> ${row.level.name} </h3> </div>   </td>
                            `;
                        else
                            return `
                         <td> <div class='d-flex my-td-inner align-items-center justify-center for-date'>   <span> ${translate(
                             "There are no Level"
                         )} </span> </div>   </td>
                            `;
                    },
                },
                {
                    targets: -4,
                    data: null,
                    render: function (data, type, row) {
                        if (row.status === "active")
                            return `<td> <div class='d-flex my-td-inner align-items-center justify-center for-date'>   <span class="badge badge-light-success">${translate(
                                row.status
                            )}</span> </div>   </td>`;

                        if (row.status === "pending")
                            return `<td> <div class='d-flex my-td-inner align-items-center justify-center for-date'>   <span class="badge badge-light-warning">${translate(
                                row.status
                            )}</span> </div>   </td>`;

                        if (row.status === "block")
                            return `
                                <span class="badge badge-light-danger">${translate(
                                    row.status
                                )}</span>
                            `;

                        return `<td> <div class='d-flex my-td-inner align-items-center justify-center for-date'>     <span class="badge badge-light-danger">${translate(
                            row.status
                        )}</span> </div>   </td>`;
                    },
                },
                {
                    targets: -2,
                    data: null,
                    render: function (data, type, row) {
                        return `<td> <div class='d-flex my-td-inner align-items-center justify-center for-date'>  <h3>  ${row.create_since} </h3> </div>   </td>`;
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
                                        <a href="/dashboard/admins/${
                                            row.id
                                        }/edit" class=" px-3 d-flex justify-content-between edit-row" >

                                           <span>  <i class="fa fa-edit text-primary"></i> </span>
                                        </a>

                                    </div><!--end::Menu-->


                                <div class=" px-3 action-item">
                                     <a href="#" class="menu-link px-3 d-flex justify-content-between delete-row" data-row-id="${
                                         row.id
                                     }" data-type="${translate("admin")}">

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

    let handleFilterDatatable = () => {
        // Select filter options
        const filterForm = document.querySelector(
            '[data-kt-docs-table-filter="form"]'
        );
        const filterButton = filterForm.querySelector(
            '[data-kt-docs-table-filter="filter"]'
        );
        const selectOptions = filterForm.querySelectorAll("select");

        // Filter datatable on submit
        filterButton.addEventListener("click", function () {
            let filterString = "";

            // Get filter values
            selectOptions.forEach((item, index) => {
                if (item.value && item.value !== "") {
                    if (index !== 0) {
                        filterString += ",";
                    }

                    // Build filter value options
                    filterString += item.name + "=" + item.value;
                }
            });

            datatable.search(filterString).draw();
        });
    };

    // Reset Filter
    let handleResetForm = () => {
        // Select reset button
        const resetButton = document.querySelector(
            '[data-kt-docs-table-filter="reset"]'
        );

        // Reset datatable
        resetButton.addEventListener("click", function () {
            // Select filter options
            const filterForm = document.querySelector(
                '[data-kt-docs-table-filter="form"]'
            );
            const selectOptions = filterForm.querySelectorAll("select");

            // Reset select2 values -- more info: https://select2.org/programmatic-control/add-select-clear-items
            selectOptions.forEach((select) => {
                $(select).val("").trigger("change");
            });

            // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
            datatable.search("").draw();
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
                        url: "/dashboard/admins/" + rowId,
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
            handleFilterDatatable();
            handleResetForm();
        },
    };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatable.init();
});
