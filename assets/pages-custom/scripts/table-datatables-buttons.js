var TableDatatablesButtons = function() {
    var initTable = function() {
        var table = $('#table-tsh');
        var oTable = table.dataTable({
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "Không có dữ liệu trong bảng",
                "info": "Hiển thị _START_ - _END_ trong số _TOTAL_",
                "infoEmpty": "Không có dữ liệu được tìm thấy",
                "infoFiltered": "",
                "lengthMenu": "Hiển thị _MENU_",
                "search": "Tìm kiếm:",
                "zeroRecords": "Không tìm thấy kết quả",
                "paginate": {
                    "previous": "Prev",
                    "next": "Next",
                    "last": "Last",
                    "first": "First"
                }
            },
            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},
            buttons: [
                { extend: 'print', className: 'btn dark btn-outline' },
                { extend: 'pdf', className: 'btn green btn-outline' },
                { extend: 'excel', className: 'btn yellow btn-outline ' },
            ],
            // setup responsive extension: http://datatables.net/extensions/responsive/
            responsive: true,
            // "ordering": false, disable column ordering 
            //"paging": false, disable pagination
            "order": [
                [0, 'desc']
            ],
            "lengthMenu": [
                [5, 10, 20, 100, -1],
                [5, 10, 20, 100, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,
            "pagingType": "bootstrap_full_number",
            // "dom": "<'row' <'col-md-12'>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
        });
        // handle datatable custom tools
        $('#table_tools > li > a.tool-action').on('click', function() {
            var action = $(this).attr('data-action');
            oTable.DataTable().button(action).trigger();
        });
    }
    return {
        //main function to initiate the module
        init: function() {
            if (!jQuery().dataTable) {
                return;
            }
            initTable();
        }
    };
}();

jQuery(document).ready(function() {
    TableDatatablesButtons.init();
});