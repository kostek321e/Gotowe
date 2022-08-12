$(document).ready(function () {

    const ajaxUrl = "http://localhost/projek2/Test-Praca/TabelaFirm.php";

    let table = $("#Tabela_Firmy").DataTable({
        orderCellsTop: true,
        autoWidth: false,
        processing: true,
        // searching: false,
        paging: false,
        dom: 'rt',
        order: [[0, 'desc']],
        serverSide: false,
        ajax: ajaxUrl,
        initComplete: function (settings, json) {
            $("#Tabela_Firmy").addClass("text-center");
            $("#Tabela_Firmy").addClass("table-striped");
        },
        columnDefs: [
            {className: "align-middle", "targets": "_all"}
        ],
        columns:[
            {
                title: 'id',
                data: 'id',
                width: '30%'

            },
            {
                title: 'Firma',
                data: 'Firma',
                width: '70%'

            }
        ]


    });



});