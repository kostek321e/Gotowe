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
    <style>

        body{
            margin: 0;
            padding: 0;
            height: 100%;
            min-height: 100%;
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
        table{
            width: 20%;
        }
        [class*="col"] {
            padding: 1rem;
            background-color: #33b5e5;
            border: 2px solid #fff;
            color: #fff;
            text-align: center;

        }
        .allButFooter {
            min-height: calc(90vh - 95px);
        }
    </style>
</head>
<?php
$navbar1='';
$navbar1= new Nav();
$navbar1->navBarOdd();
?>

<!--   Tabela Oddzialy   -->

<h2 class="text-center">Widok Tabeli "Oddziały"</h2>
<div class="table-responsive-md" style="margin: 40px">
    <table class="table table-hover table-bordered" id="Tabela_Oddzialy"  >


        </tbody>
    </table>
</div>






<div id="update_Modal4" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                    
                     <h4 class="modal-title">Oddzialy</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form4">  
                          <label>Podaj Nazwe Oddzialu</label>  
                          <input type="text" name="Oddzial" id="Oddzial" class="form-control " required />  
                          <br />  
                          <input type="hidden" name="id" id="id" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
         
           </div>  
      </div>  
 </div> 









<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
<script src="http://localhost/projek2/Test-Praca/Oddzialy.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>
<div class="allButFooter">
</div>
<footer style="position: sticky">
    <button type="button" class="btn btn-link" onclick="location.href='contacts.php';">Kontakty</button>
</footer>