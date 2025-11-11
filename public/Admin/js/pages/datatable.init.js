$(document).ready(function () {
    const tableIds = [
        "#fixed-columns-datatable",
        "#fixed-columns-datatable2",
        "#fixed-columns-datatable3",
    ];

    const options = {
        scrollY: 200,
        scrollX: true,
        searching: false,
        info: false,
        ordering: true,
        scrollCollapse: true,
        paging: false,
        fixedColumns: true,
    };

    tableIds.forEach((id) => {
        if ($.fn.DataTable.isDataTable(id)) {
            $(id).DataTable().destroy();
        }
        $(id).DataTable(options);
    });
});
