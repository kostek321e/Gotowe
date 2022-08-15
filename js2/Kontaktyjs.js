


$(document).ready(function () {



     const ajaxUrl = "http://localhost/projek2/Test-Praca/nowyplik.php";
     let table = $("#tabela_Kontakty").DataTable({
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
             $("#tabela_Kontakty").addClass("text-center");
             $("#tabela_Kontakty").addClass("table-striped");
         },
         columnDefs: [
             {className: "align-middle", "targets": "_all"}
         ],
         columns: [
             {
                 title: 'id',
                 data: 'id',
                 render: function (data, type, row) {
                     if (data) {
                         return data;
                     } else {
                         return '';
                     }
                 }
             },
             {
                 title: 'Imie',
                 data: 'Imie',
                 render: function (data, type, row) {
                     if (data) {
                         return data;
                     } else {
                         return '';
                     }
                 }
             },
             {
                 title: 'Nazwisko',
                 data: 'Nazwisko',
                 render: function (data, type, row) {
                     if (data) {
                         return data;
                     } else {
                         return '';
                     }
                 }

             },
             {
                 title: 'Firma',
                 data: 'Firma',
                 render: function (data, type, row) {
                     if (data) {
                         return data;
                     } else {
                         return '';
                     }
                 }


             },
             {
                 title: 'Oddzial',
                 data: 'Oddzial',
                 render: function (data, type, row) {
                     if (data) {
                         return data;
                     } else {
                         return '';
                     }
                 }


             },
             {
                 title: 'Dzial',
                 data: 'Dzial',
                 render: function (data, type, row) {
                     if (data) {
                         return data;
                     } else {
                         return '';
                     }
                 }


             },
             {
                 title: 'Stanowisko',
                 data: 'Stanowisko',
                 render: function (data, type, row) {
                     if (data) {
                         return data;
                     } else {
                         return '';
                     }
                 }


            },
             {
                 title: 'numer Stacjonarny',
                 data: 'numerStacjonarny',
                 render: function (data, type, row) {
                     if (data) {
                         return data;
                     } else {
                         return '';
                     }
                 }


             },
             {
                 title: 'numer komorkowy',
                 data: 'numerKomorkowy',
                 render: function (data, type, row) {
                     if (data) {
                         return data;
                     } else {
                         return '';
                     }
                 }


             },
             {
                 title: 'Adres Email',
                 data: 'adresEmail',
                 render: function (data, type, row) {
                     if (data) {
                         return data;
                     } else {
                         return '';
                     }
                 }


             }, {
                 title: 'Akcje',
                 data: null,
                 targets: 10,
                 render: function (data, type, row, meta) {
                     let buttons = '<div class="btn-group btn-group-sm2" role="group">';
                     buttons += '<button title="Edytuj" name="EditBtn" id="' + data.id +'"  class="btn btn-warning EditBtn">Edytuj</button>';
                     buttons += '<button name="DeleteBtn" id="' + data.id +'" title="Usuń"  class="btn btn-danger DeleteBtn">Usuń</button>';
                     buttons += '</div>'
                     return buttons;
                 },

                 },

         ]




     });

        $(document).on('click', '.DeleteBtn', function (event) {
            var table = $('tabela_Kontakty').DataTable();
            var id = $(this).attr('id');
            if (confirm('Czy jestes tego pewien?')) {
                $.ajax({
                    url: "http://localhost/projek2/Test-Praca/usuwanie.php",
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
         $('#insert_form')[0].reset();  
    });  


    $(document).on('click', '.EditBtn', function (event) {
var id = $(this).attr("id");
$.ajax({
    url: "http://localhost/projek2/Test-Praca/fetchUpdateKom.php",
    method:"POST",
    data:{id:id},
    dataType:"json",
    success:function(data){
        $('#Imie').val(data.Imie);
        $('#Nazwisko').val(data.Nazwisko);
        $('#Firma').val(data.Firma);
        $('#Oddzial').val(data.Oddzial);
        $('#Dzial').val(data.Dzial);
        $('#Stanowisko').val(data.Stanowisko);
        $('#numerStacjonarny').val(data.numerStacjonarny);
        $('#numerKomorkowy').val(data.numerKomorkowy);
        $('#adresEmail').val(data.adresEmail);
        $('#id').val(data.id);
        $('#insert').val("Edytuj");
        $('#update_Modal').modal('show');
    }
     });
});



$('#insert_form').on("submit", function(event){  
    event.preventDefault();   
         $.ajax({  
              url:"http://localhost/projek2/Test-Praca/insertKon.php",  
              method:"POST",  
              data:$('#insert_form').serialize(),  
              beforeSend:function(){  
                   $('#insert').val("Dodawanie");  
              },  
              success:function(data){  
                   $('#insert_form')[0].reset();  
                   $('#update_Modal').modal('hide');  
                   $('#tabela_Kontakty').html(data);  
              }  
         });  
      
});  

    $(document).on('click', '.addKon', function (event) {
        var id = $(this).attr("id");
        $.ajax({
            url: "http://localhost/projek2/Test-Praca/nowyplik.php",
            method:"POST",
            data:{id:id},
            dataType:"json",
            success:function(){
                $('#insert1').val("Dodaj");
                $('#update_Modal').modal('show');
            }
        })
            });
    
            $(document).on('submit','#update_Modal',function(event){
                var Imie = $('#Imie').val();
                var Nazwisko = $('#Nazwisko').val();
                var Firma = $('#Firma').val();
                var Oddzial = $('#Oddzial').val();
                var Dzial = $('#Dzial').val();
                var Stanowisko = $('#Stanowisko').val();
                var numerStacjonarny = $('#numerStacjonarny').val();
                var numerKomorkowy = $('#numerKomorkowy').val();
                var adresEmail = $('#adresEmail').val();
                $.ajax({
                    url: 'http://localhost/projek2/Test-Praca/insertKon.php',
                    method: 'POST',
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success: function(data)
                    {
                        $('#update_Modal')[0].reset();
                        $('#update_Modal').modal('hide');
                        DataTable.ajax.reload();
                    }
                });
    
            });

  });
});
