


$(document).ready(function () {


     const ajaxUrl = "http://localhost/projek2/Test-Praca/nowyplik.php";
     let table = $("#tabela_Kontakty").DataTable({
         orderCellsTop: true,
         autoWidth: false,
         processing: true,
         // searching: false,
         paging: false,
         dom: 'rt',
         order: [[0, 'desc']],
         serverSide: false,
         ajax: {
             url: ajaxUrl,
         },
         pageLenght: 10,




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
                 data: 'id'

             },
             {
                 title: 'Imie',
                 data: 'Imie',

             },
             {
                 title: 'Nazwisko',
                 data: 'Nazwisko'


             },
             {
                 title: 'Firma',
                 data: 'Firma',


             },
             {
                 title: 'Oddzial',
                 data: 'Oddzial',


             },
             {
                 title: 'Dzial',
                 data: 'Dzial',


             },
             {
                 title: 'Stanowisko',
                 data: 'Stanowisko',


            },
             {
                 title: 'numer Stacjonarny',
                 data: 'numerStacjonarny',


             },
             {
                 title: 'numer komorkowy',
                 data: 'numerKomorkowy',


             },
             {
                 title: 'Adres Email',
                 data: 'adresEmail',


             }, {
                 title: 'Akcje',
                 data: null,
                 targets: 10,
                 render: function (data, type, row, meta) {
                     let buttons = '<center><div class="btn-group btn-group-sm2" role="group">';
                     buttons += '<button title="Edytuj"  class="btn btn-warning EditButton">Edytuj</button>';
                     buttons += '<button name="DeleteBtn" id="DeleteBtn" title="Usuń"  class="btn btn-danger DeleteBtn">Usuń</button>';
                     buttons += '</div></center>'
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
 });






