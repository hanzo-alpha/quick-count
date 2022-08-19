/*=========================================================================================
    File Name: table-extended.js
    Description: table extended js
    ----------------------------------------------------------------------------------------
    Item Name: Frest HTML Admin Template
    Version: 1.0
    Author: Pixinvent
    Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/
(function ($, DataTable) {

    // Datatable global configuration
    $.extend(true, DataTable.defaults, {
        language: {
            "sProcessing": "Sedang memproses ...",
            "sLengthMenu": "Tampilkan _MENU_ entri",
            "sZeroRecords": "Tidak ditemukan data yang sesuai",
            "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
            "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
            "sInfoPostFix": "",
            "sSearch": "Pencarian :",
            "sUrl": "",
            "sInfoThousands": ".",
            "sLoadingRecords": "Memuat...",
            "oPaginate": {
                "sFirst": "Pertama",
                "sPrevious": "Sebelumnya",
                "sNext": "Selanjutnya",
                "sLast": "Terakhir"
            },
            // "oAria": {
            //     "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            //     "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            // }
        }
    });

})(jQuery, jQuery.fn.dataTable);

(function (window, document, $) {

    let $primary = '#5A8DEE';
    let $danger = '#FF5B5C';
    let $warning = '#FDAC41';
    let $info = '#00CFDD';
    let $gray_light = '#828D99';

    // table extended transactions
    $('#table-mesin').DataTable({
            // "responsive": true,
            // "searching": true,
            // "lengthChange": true,
            // "paging": true,
            // "bInfo": true,
            "columnDefs": [
                { "orderable": false, "targets": [0,7,8] },
            ]
        }
    );
    // table extended success
    // $('#table-extended-success').DataTable({
    //         "responsive": true,
    //         "searching": false,
    //         "lengthChange": false,
    //         "paging": false,
    //         "bInfo": false,
    //         "columnDefs": [
    //             { "orderable": false, "targets": [1, 2, 3, 4, 5] },
    //         ]
    //     }
    // );

    // table extended checkbox
    // var tablecheckbox = $('#table-extended-chechbox').DataTable({
    //     "searching": false,
    //     "lengthChange": false,
    //     "paging": false,
    //     "bInfo": false,
    //     'columnDefs': [
    //         { "orderable": false, "targets": [0, 3, 4] },   //to disable sortying in col 0,3 & 4
    //         {
    //             'targets': 0,
    //             'render': function (data, type, row, meta) {
    //                 if (type === 'display') {
    //                     data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'; //body checkbox
    //                 }
    //                 return data;
    //             },
    //             'checkboxes': {
    //                 'selectRow': true,
    //                 'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes" checked=""><label></label></div >'  //head checkbox
    //             }
    //         }],
    //     'select': 'multi',
    //     'order': [[1, 'asc']]
    // });
    // Single Date Picker
    // -----------------
    // $('.single-daterange').daterangepicker({
    //     singleDatePicker: true,
    //     showDropdowns: true,
    //     minYear: 1990,
    //     maxYear: parseInt(moment().format('YYYY'), 10)
    // });
})(window, document, jQuery);
