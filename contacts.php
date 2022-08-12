<?php
include('klasy.php');
?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>


    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bootstrap 5</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="resources/semantic.min.css">
    <link rel="stylesheet" href="resources/custom.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.12.1/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.12.1/b-2.2.3/datatables.min.css"/>

    <style>
        body{
            margin: 0;
            padding: 0;
            height: 100%;
        }
        footer{
            float: left;
            width: 100%;
            background-color: gray;
            margin: 20px auto 0px auto;
            font-size: 10px;
            text-align: left;
            clear: both;
            position: absolute; bottom: 0;
        }
        [class*="col"] {
            padding: 1rem;
            background-color: #33b5e5;
            border: 2px solid #fff;
            color: #fff;
            text-align: center;
        }

    </style>
</head>
<body>

<?php
$navbar1='';
$navbar1= new Nav();
$navbar1->navBarKon();
?>
<h2 style="margin-top: 20px" class="text-center">Kontakty</h2>


<div class="table-responsive-md" style="margin: 20px" >
    <table class="table table-hover table-bordered"  id="tabela_Kontakty">
<!--    <thread>-->
<!--        <th>id</th>-->
<!--        <th>Imie</th>-->
<!--        <th>Naziwsko</th>-->
<!--        <th>Firma</th>-->
<!--        <th>Oddzial</th>-->
<!--        <th>Dzial</th>-->
<!--        <th>Stanowisko</th>-->
<!--        <th>numerStacjonarny</th>-->
<!--        <th>numerKomorkowy</th>-->
<!--        <th>adresEmail</th>-->
<!--        <th>Akcje</th>-->
<!--    </thread>-->
    </table>
    <?php
    $URekord= '';
    $id2='';
    if (isset($_POST['Usun'])){
    $id2=strip_tags($_POST['URekord']);
    $URekord = new Kontakty($id2,'','','','','','','','','');
    $URekord->RemoveKontakt();
    }?>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.12.1/b-2.2.3/datatables.min.js"></script>
<script src="http://localhost/projek2/Test-Praca/js2/Kontaktyjs.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>




<script>
/*
    function delete_data(id){
        if(confirm("Czy jesteś tego pewien?")){
            var form_data = new FormData();

            form_data.append('id', id);
            form_data.append('action','delete');

            fetch('nowyplik.php',{
                method: "POST",

                body:form_data

            }).then(function (response){
                return response.json();
            }).then(function (responseData){
                _('Success_message').innerHTML = responseData.success;

                table.update();
            });
        }
    }

*/
</script>

















<div class="allButFooter">
</div>

</body>
</html>