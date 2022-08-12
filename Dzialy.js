$(document).ready(function () {

    const ajaxUrl = "http://localhost/projek2/Test-Praca/TabelaDzialy.php";

    let table = $("#Tabela_Dzialy").DataTable({
        orderCellsTop: true,
        autoWidth: false,
        processing: true,
        searching: true,
        paging: true,
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

            },{
                title: 'Akcje',
                data: null,
                targets: 10,
                render: function (data, type, row, meta) {
                    let buttons = '<div class="btn-group btn-group-sm2" role="group">';
                    buttons += '<button title="Edytuj" name="EditBtn"  class="btn btn-warning EditBtn">Edytuj</button>';
                    buttons += '<button name="DeleteBtn" id="DeleteBtn" title="Usuń"  class="btn btn-danger DeleteBtn">Usuń</button>';
                    buttons += '</div>'
                    return buttons;
                },

            },
        ]


    });


    $(document).on('click', '.DeleteBtn', function (event) {

        var id = $(this).data('id');
        if (confirm('Czy jestes tego pewien?')) {
            $.ajax({
                url: "http://localhost/projek2/Test-Praca/Dzialy/usuwanieDzialy.php",
                data: {id: id},
                type: "post",
                success: function (data) {
                    var json = JSON.parse(data);
                    var status = json.status;
                    if (status == 'sucess') {
                        $('#' + id).closest('tr').remove();
                    } else {
                        alert('failed');
                    }

                }
            });
        }
    });
});