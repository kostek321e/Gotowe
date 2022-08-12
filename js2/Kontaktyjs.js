


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
                     buttons += '<button title="Edytuj" name="EditBtn"  class="btn btn-warning EditBtn">Edytuj</button>';
                     buttons += '<button name="DeleteBtn" id="DeleteBtn" title="Usuń"  class="btn btn-danger DeleteBtn">Usuń</button>';
                     buttons += '</div>'
                     return buttons;
                 },

                 },

         ]




     });
    $(document).on('click'), '.DeleteBtn', function (event) {
        var table = $('#tabela_Kontakty').DataTable();
        event.preventDefault();
        var id = $(this).data('id');
        if (confirm("Czy jesteś tego pewny?")) {
            $.ajax({
                url: "usuwanie.php",
                data: {id: id},
                type: "post",
                success: function (data) {
                    var json = JSON.parse(data)
                    status = json.status;
                    if (status == 'success') {
                        $("#" + id).closest('tr').remove();
                    } else {
                        alert('Failed');
                        return;
                    }
                }
            });
        } else {
            return null;
        }
    }
    // $(document).on('submit','#updateUser',function (e){
    //     e.preventDefault();
    //     var id= $('#id').val();
    //     var Imie = $('#Imie').val();
    //     var Nazwisko= $('#Naziwsko').val();
    //     var Firma= $('#Firma').val();
    //     var Oddzial= $('#Oddzial').val();
    //     var Dzial= $('#Dzial').val();
    //     var Stanowisko= $('#Stanowisko').val();
    //     var numerStacjonarny= $('#numerStacjonarny').val();
    //     var numerKomorkowy= $('#numerKomorkowy').val();
    //     var adresEmail= $('#adresEmail').val();
    //     if(Imie != '' && Nazwisko != '' && Firma != '' && Oddzial != '' && Dzial != '' && Stanowisko != '' && numerStacjonarny != '' && numerKomorkowy != '' && adresEmail != '')
    //     {
    //         $ajax({
    //             url:"update.php",
    //             type: "post",
    //             data:{id:id,Imie:Imie,Nazwisko:Nazwisko,Firma:Firma,Oddzial:Oddzial,Dzial:Dzial,Stanowisko:Stanowisko,numerStacjonarny:numerStacjonarny,numerKomorkowy:numerKomorkowy,adresEmail:,adresEmail},
    //             success:function (data)
    //             {
    //                 table=$("#tabela_Kontakty").dataTable();
    //                 var button = '<td><a href="javascript:void();" data-id="' +id +'" class="btn btn-warning btn-sm editbtn">Edytuj</a>'
    //             }
    //         })
    //     }
    // }


    $('#tabela_Kontakty').on('click','.editbtn',function (event){
        var table = $('#tabela_Kontakty').dataTable();
        var trid = $(this).closest('tr').attr('id');
        var id = $(this).data('id');
        //zrob modal

        $.ajax({
            url:"get_single_data.php",
            data:{id:id},
            type:'post',
            success:function(data){
                var json = JSON.parse(data);
                $('#ImieField').val(json.Imie);
                $('#NazwiskoField').val(json.Nazwisko);
                $('#FirmaField').val(json.Firma);
                $('#OddzialField').val(json.Oddzial);
                $('#DzialField').val(json.Dzial);
                $('#StanoiwskoField').val(json.Stanoiwsko);
                $('#numerStacjonarnyField').val(json.numerStacjonarny);
                $('#numerKomorkowyField').val(json.numerKomorkowy);
                $('#adresEmailField').val(json.adresEmail);
            }
        })
    })


        $(document).on('click', '.DeleteBtn', function (event) {

            var id = $(this).data('id');
            if (confirm('Czy jestes tego pewien?')) {
                $.ajax({
                    url: "http://localhost/projek2/Test-Praca/js2/usuwanie.php",
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

///////////////////   http://localhost/projek2/Test-Praca/js2/editModal.php   ////////////////////////////////////////////

    $(document).on('click', '.EditBtn', function (event) {
        $('#EditModal').modal(),
        $.ajax({
            url: "http://localhost/projek2/Test-Praca/js2/editModal.php",
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
        $('#EditModal').modal();
        var id = $(this).data('id');
        // if (confirm('Czy jestes tego pewien?')) {
        //     $.ajax({
        //         url: "http://localhost/projek2/Test-Praca/js2/edytowanie.php",
        //         data: {id: id},
        //         type: "post",
        //         success: function (data) {
        //             var json = JSON.parse(data);
        //             var status = json.status;
        //             if (status == 'sucess') {
        //                 $('#' + id).closest('tr').remove();
        //             } else {
        //                 alert('failed');
        //             }
        //
        //         }
        //     });
        // }
    });

///////////////////////////////////////////////////////////
    function EditModal() {
        return modalCreate('Pobierz szanse z LS', 'http://localhost/projek2/Test-Praca/js2/editModal.php')
    }

 });






