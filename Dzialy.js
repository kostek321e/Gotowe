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
                    buttons += '<button title="Edytuj" name="EditBtn" id="' + data.id +'" class="btn btn-warning EditBtn">Edytuj</button>';
                    buttons += '<button name="DeleteBtn" id="' + data.id +'" title="Usuń"  class="btn btn-danger DeleteBtn">Usuń</button>';
                    buttons += '</div>'
                    return buttons;
                },

            },
        ]


    });


    $(document).on('click', '.DeleteBtn', function (event) {
        var table = $('Tabela_Dzialy').DataTable();
        var id = $(this).attr('id');
        if (confirm('Czy jestes tego pewien?')) {
            $.ajax({
                url: "http://localhost/projek2/Test-Praca/usuwanieDzialy.php",
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
             $('#insert_form3')[0].reset();  
        });  
    
    
        $(document).on('click', '.EditBtn', function (event) {
    var id = $(this).attr("id");
    $.ajax({
        url: "http://localhost/projek2/Test-Praca/fetchUpdateDzial.php",
        method:"POST",
        data:{id:id},
        dataType:"json",
        success:function(data){
            $('#Dzial').val(data.Dzial);
            $('#id').val(data.id);
            $('#insert').val("Edytuj");
            $('#update_Modal3').modal('show');
        }
         });
    });
    
    
    
    $('#insert_form3').on("submit", function(event){  
        event.preventDefault();   
             $.ajax({  
                  url:"http://localhost/projek2/Test-Praca/insertDzial.php",  
                  method:"POST",  
                  data:$('#insert_form3').serialize(),  
                  beforeSend:function(){  
                       $('#insert').val("Dodawanie");  
                  },  
                  success:function(data){  
                       $('#insert_form3')[0].reset();  
                       $('#update_Modal3').modal('hide');  
                       $('#Tabela_Dzialy').html(data);  
                  }  
             });  
          
    });  
    
        $(document).on('click', '.DzialBtn', function (event) {
            var id = $(this).attr("id");
            $.ajax({
                url: "http://localhost/projek2/Test-Praca/TabelaDzialy.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(){
                    $('#insert').val("Dodaj");
                    $('#update_Modal3').modal('show');
                }
            })
                });
        
                $(document).on('submit','#update_Modal3',function(event){
                    var Firma = $('#Firma').val();
                    $.ajax({
                        url: 'http://localhost/projek2/Test-Praca/insertDzial.php',
                        method: 'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success: function(data)
                        {
                            $('#update_Modal3')[0].reset();
                            $('#update_Modal3').modal('hide');
                            DataTable.ajax.reload();
                        }
                    });
        
                });
    
      });














});