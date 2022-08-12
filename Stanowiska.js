$(document).ready(function () {

    const ajaxUrl = "http://localhost/projek2/Test-Praca/TabelaStanowiska.php";

    let table = $("#Tabela_Stanowiska").DataTable({
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
            $("#Tabela_Stanowiska").addClass("text-center");
            $("#Tabela_Stanowiska").addClass("table-striped");
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
                title: 'Stanowisko',
                data: 'stanowisko',
                width: '70%'

            }
        ]


    });



});