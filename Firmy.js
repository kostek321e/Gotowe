$(document).ready(function () {

    const ajaxUrl = "http://localhost/projek2/Test-Praca/TabelaFirm.php";

    let table = $("#Tabela_Firmy").DataTable({
        orderCellsTop: true,
         autoWidth: false,
         processing: true,
         searching: true,
         paging: true,
         dom: 'rt',
         order: [[0, 'desc']],
         serverSide: true,
         ajax: {
             url: ajaxUrl,
         },
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

            },
            {
                title: 'Akcje',
                data: null,
                targets: 10,
                render: function (data, type, row, meta) {
                    let buttons = '<div class="btn-group btn-group-sm2" role="group">';
                    buttons += '<button title="Edytuj" name="EditBtn" id="' + data.id +'"  class="btn btn-warning EditBtn">Edytuj</button>';
                    buttons += '<button name="DeleteBtn" id="' + data.id +'" title="Usuń"  class="btn btn-danger DeleteBtn2">Usuń</button>';
                    buttons += '</div>'
                    return buttons;
                },

            },
        ]


    });


    $(document).on('click', '.DeleteBtn2', function (event) {
        var table = $('Tabela_Firmy').DataTable();
        var id = $(this).attr('id');
        if (confirm('Czy jestes tego pewien?')) {
            $.ajax({
                url: "http://localhost/projek2/Test-Praca/usuwanieFrm.php",
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
             $('#insert_form2')[0].reset();  
        });  
    
    
        $(document).on('click', '.EditBtn', function (event) {
    var id = $(this).attr("id");
    $.ajax({
        url: "http://localhost/projek2/Test-Praca/fetchUpdateFirma.php",
        method:"POST",
        data:{id:id},
        dataType:"json",
        success:function(data){
            $('#Firma').val(data.Firma);
            $('#id').val(data.id);
            $('#insert').val("Edytuj");
            $('#update_Modal2').modal('show');
        }
         });
    });
    
    
    
    $('#insert_form2').on("submit", function(event){  
        event.preventDefault();   
             $.ajax({  
                  url:"http://localhost/projek2/Test-Praca/insertFirma.php",  
                  method:"POST",  
                  data:$('#insert_form2').serialize(),  
                  beforeSend:function(){  
                       $('#insert').val("Dodawanie");  
                  },  
                  success:function(data){  
                       $('#insert_form2')[0].reset();  
                       $('#update_Modal2').modal('hide');  
                       $('#Tabela_Firmy').html(data);  
                       $('#Tabela_Firmy').DataTable().ajax.reload();
                  }  
             });  
          
    });  
    
        $(document).on('click', '.FirmaBtn2', function (event) {
            var id = $(this).attr("id");
            $.ajax({
                url: "http://localhost/projek2/Test-Praca/TabelaFirm.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(){
                    $('#insert').val("Dodaj");
                    $('#update_Modal2').modal('show');
                }
            })
                });
        
                $(document).on('submit','#update_Modal2',function(event){
                    var Firma = $('#Firma').val();
                    $.ajax({
                        url: 'http://localhost/projek2/Test-Praca/insertFirma.php',
                        method: 'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success: function(data)
                        {
                            $('#update_Modal2')[0].reset();
                            $('#update_Modal2').modal('hide');
                            $('#Tabela_Firmy').DataTable().ajax.reload();
                        }
                    });
        
                });
    
      });

});