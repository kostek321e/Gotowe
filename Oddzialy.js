$(document).ready(function () {

    const ajaxUrl = "http://localhost/projek2/Test-Praca/TabelaOddzialy.php";

    let table = $("#Tabela_Oddzialy").DataTable({
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
            $("#Tabela_Oddzialy").addClass("text-center");
            $("#Tabela_Oddzialy").addClass("table-striped");
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
                title: 'Oddzial',
                data: 'Oddzial',
                width: '70%'

            }
        ]


    });



});