$(document).ready(function () {

    const ajaxUrl = "http://localhost/projek2/Test-Praca/TabelaDzialy.php";

    let table = $("#Tabela_Dzialy").DataTable({
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
            $("#Tabela_Dzialy").addClass("text-center");
            $("#Tabela_Dzialy").addClass("table-striped");
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
                title: 'Dzial',
                data: 'Dzial',
                width: '70%'

            }
        ]


    });



});