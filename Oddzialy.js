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

            },            {
                title: 'Akcje',
                data: null,
                targets: 10,
                render: function (data, type, row, meta) {
                    let buttons = '<div class="btn-group btn-group-sm2" role="group">';
                    buttons += '<button title="Edytuj" name="EditBtn" id="' + data.id +'" class="btn btn-warning EditBtn">Edytuj</button>';
                    buttons += '<button name="DeleteBtn" id="' + data.id +'" title="Usuń"  class="btn btn-danger DeleteBtn">Usuń</button>';
                    buttons += '</div>'
                    return buttons;
                },

            },
        ]


    });

    $(document).on('click', '.DeleteBtn', function (event) {
        var table = $('Tabela_Oddzialy').DataTable();
        var id = $(this).attr('id');
        if (confirm('Czy jestes tego pewien?')) {
            $.ajax({
                url: "http://localhost/projek2/Test-Praca/usuwanieOddzialy.php",
                data: {id: id},
                type: "post",
                success: function (data) {
                    var json = JSON.parse(data);
                    var status = json.status;
                    if (status == 'success') {
                    } else {
                        alert('failed');
                    }
                
                }
            });
        }
    });









    $(document).ready(function(){  
        $('#add').click(function(){  
             $('#insert').val("Dodaj");  
             $('#insert_form4')[0].reset();  
        });  
    
    
        $(document).on('click', '.EditBtn', function (event) {
    var id = $(this).attr("id");
    $.ajax({
        url: "http://localhost/projek2/Test-Praca/fetchUpdateOddzial.php",
        method:"POST",
        data:{id:id},
        dataType:"json",
        success:function(data){
            $('#Oddzial').val(data.Oddzial);
            $('#id').val(data.id);
            $('#insert').val("Edytuj");
            $('#update_Modal4').modal('show');
        }
         });
    });
    
    
    
    $('#insert_form4').on("submit", function(event){  
        event.preventDefault();   
             $.ajax({  
                  url:"http://localhost/projek2/Test-Praca/insertOddzial.php",  
                  method:"POST",  
                  data:$('#insert_form4').serialize(),  
                  beforeSend:function(){  
                       $('#insert').val("Dodawanie");  
                  },  
                  success:function(data){  
                       $('#insert_form4')[0].reset();  
                       $('#update_Modal4').modal('hide');  
                       $('#Tabela_Dzialy').html(data);  
                  }  
             });  
          
    });  
    
        $(document).on('click', '.OddzialBtn', function (event) {
            var id = $(this).attr("id");
            $.ajax({
                url: "http://localhost/projek2/Test-Praca/TabelaOddzialy.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(){
                    $('#insert').val("Dodaj");
                    $('#update_Modal4').modal('show');
                }
            })
                });
        
                $(document).on('submit','#update_Modal4',function(event){
                    var Firma = $('#Firma').val();
                    $.ajax({
                        url: 'http://localhost/projek2/Test-Praca/insertOddzial.php',
                        method: 'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success: function(data)
                        {
                            $('#update_Modal4')[0].reset();
                            $('#update_Modal4').modal('hide');
                            DataTable.ajax.reload();
                        }
                    });
        
                });
    
      });


});