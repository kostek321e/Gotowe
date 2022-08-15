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
    </table>
</div>


<div id="update_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                    
                     <h4 class="modal-title">Kontakty</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Podaj Imie</label>  
                          <input type="text" name="Imie" id="Imie" class="form-control " required />  
                          <br />  
                          <label>Podaj Nazwisko</label>  
                          <input type="text" name="Nazwisko" id="Nazwisko" class="form-control" required /> 
                          <br />  
                          <label>Wybierz Firme</label>  
                          <select name="Firma" id="Firma" class="form-select" required>  
                               <option value=""></option>  
                               <?php
                        $SelectFirm = '';
                        $SelectFirm = new SELEKTY();
                        $SelectFirm->WyborFirmy();
                        ?>
                          </select>  
                          <br />  
                          <label>Wybierz Oddzial</label>  
                          <select name="Oddzial" id="Oddzial" class="form-select" required>  
                               <option value=""></option>  
                               <?php
                        $SelectOddzial= '';
                        $SelectOddzial= new SELEKTY();
                        $SelectOddzial->WyborOddzialu();
                        ?>
                          </select>  
                          <br />  
                          <label>Wybierz Dzial</label>  
                          <select name="Dzial" id="Dzial" class="form-select">  
                               <option value=""></option>  
                               <?php
                        $SelectDzial='';
                        $SelectDzial= new SELEKTY();
                        $SelectDzial->WyborDzialu();
                        ?>
                          </select>  
                          <br />  
                          <label>Wybierz Stanowisko</label>  
                          <select name="Stanowisko" id="Stanowisko" class="form-select" required>  
                               <option value=""></option>  
                               <?php
                        $SelectStanowisko='';
                        $SelectStanowisko= new SELEKTY();
                        $SelectStanowisko->WyborStanowiska();
                        ?>
                          </select>  
                          <br />  
                          <label>Podaj numer Stacjonarny</label>  
                          <input type="number"  min="100000000" max="999999999" title="Niepoprawny numer Telefonu" name="numerStacjonarny" id="numerStacjonarny" class="form-control" />  
                          <br />  
                          <label>Podaj numer Komorkowy</label>  
                          <input type="number"   min="100000000" max="999999999" title="Niepoprawny numer Telefonu" name="numerKomorkowy" id="numerKomorkowy" class="form-control" />  
                          <br />  
                          <label>Podaj adres Email</label>  
                          <input type="email" title="Podany Email jest niepoprawny." pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" name="adresEmail" id="adresEmail" class="form-control" />  
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
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.12.1/b-2.2.3/datatables.min.js"></script>
<script src="http://localhost/projek2/Test-Praca/js2/Kontaktyjs.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>