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
<body>
<?php
$navbar1='';
$navbar1= new Nav();
$navbar1->navBar();
?>
<h2 style="margin-top: 20px" class="text-center">Tabele Słownikowe</h2>

<div class="container-lg my-5">
    <div class="row">
        <div class="col-md-4"><button type="button" class="btn btn-lg" onclick="location.href='index.php';">Strona główna</button>
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-link btn-lg"  onclick="location.href='contacts.php';">Kontakty</button>
        </div>
        <div class="col-md-4"><button type="button" class="btn btn-lg" onclick="location.href='management.php';">Zarządzanie</button></div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>




<h2 class="text-center">Tabela "Firmy"</h2>

<div class="row">
    <div class="col-md-4">
        <h2 class="text-center">Dodawanie rekordu do Tabeli "Firmy"</h2>
        <?php
        $firmaa= '';
        if (isset($_POST['dodajFirme'])){
            $firmaa = new AddSlownikowa(strip_tags($_POST['firm']));
            $firmaa->SendFirmaToBase();
            echo '<script
    type="text/javascript">window.location.href="view.php";</script>';
        }
        ?>
        <form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="ui form" style="margin-top: 150px">
            <div class="required field">
                <label>Nazwa Firmy</label>
                <input type="text" name="firm" id="firm" required style="width: 400px;">
            </div>
            <input type="submit" class="ui primary button" id="dodajFirme" name="dodajFirme" value="Dodaj Firme" > </input>
        </form>
    </div>
    <div class="col-md-4">
        <h2 class="text-center">Widok Tabeli "Firmy"</h2>
        <div class="table-responsive-md">
<!--            <table class="table table-hover table-bordered" id="Tabela_Firmy" >-->
<!--                <thead>-->
<!--                <tr>-->
<!---->
<!--                    <th scope="col">ID</th>-->
<!--                    <th width="90%" scope="col">Firma</th>-->
<!---->
<!--                </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
<!--                <tr>-->
<!--                    --><?php
//                    $widoktabelifirmy='';
//                    $widoktabelifirmy = new Widoki();
//                    $widoktabelifirmy->WidokFirm();
//                    ?>
<!--                </tr>-->
<!---->
<!--               </tbody>-->
<!--            </table>-->
        </div>
    </div>
    <div class="col-md-4">
        <h2 class="text-center">Usuwanie rekordów z Tabeli "Firmy"</h2>
        <?php
        $FRekord= '';
        if (isset($_POST['UsunRekordF'])){
            $FRekord = new Remove(strip_tags($_POST['FRekord']));
            $FRekord->RemoveFirma();
            echo strip_tags($_POST['FRekord']);
            echo '<script
    type="text/javascript">window.location.href="view.php";</script>';
        }

        ?>

        <div align="center">

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="ui form" style="margin-top: 134px">
                
                    <label style="margin-top: 20px" for="Firma" class="form-label">Wybierz Rekord</label>
                    <select name="FRekord" class="form-select" id="FRekord" required style="width: 300px" >
                        <option value="" name="FRekord" id="FRekord"></option>
                        <?php
                        $SelectFirm = '';
                        $SelectFirm = new SELEKTY();
                        $SelectFirm->WyborFirmyDoUsuniecia();
                        ?>
                    </select>
                    <input style="margin-top: 20px" type="submit" class="ui primary button" id="UsunRekordF" name="UsunRekordF" value="Usuń Rekord"> </input>

            </form>
        </div>
    </div>
</div>



<h2 class="text-center">Tabela "Oddziały"</h2>

<div class="row">
    <div class="col-md-4">
        <h2 class="text-center">Dodawanie rekordu do Tabeli "Oddziały"</h2>
        <?php
        $oddzial= '';
        if (isset($_POST['dodajOddzial'])){
            $oddzial = new AddSlownikowa(strip_tags($_POST['oddzial']));
            $oddzial->SendDeparToBase();
            echo '<script
    type="text/javascript">window.location.href="view.php";</script>';
        }

        ?>
        <form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="ui form" style="margin-top: 150px">
            <div class="required field">
                <label>Nazwa Oddziału</label>
                <input type="text" name="oddzial" id="oddzial" required style="width: 400px;">
            </div>
            <input type="submit" class="ui primary button" id="dodajOddzial" name="dodajOddzial" value="Dodaj Oddział"> </input>
        </form>
    </div>
    <div class="col-md-4">
<!--        <h2 class="text-center">Widok Tabeli "Oddziały"</h2>-->
<!---->
<!--        <div class="table-responsive-md">-->
<!--            <table class="table table-hover table-bordered" id="Tabela_Oddzialy" >-->
<!--<                <thead>-->-->
<!--<!               <tr>-->-->
<!--<-->
<!--<                    <th scope="col">ID</th>-->-->
<!--                  <th width="90%" scope="col">Oddział</th>-->-->
<!--<-->-->
<!--<                </tr>-->-->
<!--<                </thead>-->-->
<!--<                <tbody>-->-->
<!--<                <tr>-->-->
<!--<                    -->--><?php
////                    $widoktabelioddzialy='';
////                    $widoktabelioddzialy= new Widoki();
////                    $widoktabelioddzialy->WidokOddzialow();
////                    ?>
<!--<                </tr>-->-->
<!---->
<!--                </tbody>-->
<!--            </table>-->
<!--        </div>-->
    </div>
    <div class="col-md-4">
        <h2 class="text-center">Usuwanie rekordów z Tabeli "Oddziały"</h2>
        <?php
        $ORekord= '';
        if (isset($_POST['UsunRekordO'])){
            $ORekord = new Remove(strip_tags($_POST['ORekord']));
            $ORekord->RemoveOddzial();
            echo '<script
    type="text/javascript">window.location.href="view.php";</script>';
        }

        ?>

        <div align="center">

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="ui form" style="margin-top: 134px">

                <label style="margin-top: 20px" for="Oddzial" class="form-label">Wybierz Rekord</label>
                <select name="ORekord" class="form-select" id="ORekord" required style="width: 300px" >
                    <option value="" name="ORekord" id="ORekord"></option>
                    <?php
                    $SelectFirm = '';
                    $SelectFirm = new SELEKTY();
                    $SelectFirm->WyborOddzialuDoUsuniecia();
                    ?>
                </select>
                <input style="margin-top: 20px" type="submit" class="ui primary button" id="UsunRekordO" name="UsunRekordO" value="Usuń Rekord"> </input>

            </form>
        </div>
    </div>
</div>





<h2 class="text-center">Tabela "Działy"</h2>

<div class="row">
    <div class="col-md-4">
        <h2 class="text-center">Dodawanie rekordu do Tabeli "Działy"</h2>
        <?php
        $dzial= '';
        if (isset($_POST['dodajDzial'])){
            $dzial = new AddSlownikowa(strip_tags($_POST['dzial']));
            $dzial->SendSecToBase();
            echo '<script
    type="text/javascript">window.location.href="view.php";</script>';
        }
        ?>
        <form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="ui form" style="margin-top: 150px">
            <div class="required field">
                <label>Nazwa Działu</label>
                <input type="text" name="dzial" id="dzial" required style="width: 400px">
            </div>
            <input type="submit" class="ui primary button" id="dodajDzial" name="dodajDzial" value="Dodaj Dział"></input>
        </form>
    </div>
    <div class="col-md-4">
        <h2 class="text-center">Widok Tabeli "Działy"</h2>

<!--        <div class="table-responsive-md">-->
<!--            <table class="table table-hover table-bordered" id="Tabela_Dzialy" >-->
<!--                <thead>-->
<!--                <tr>-->
<!---->
<!--                    <th scope="col">ID</th>-->
<!--                    <th width="90%" scope="col">Dział</th>-->
<!---->
<!--                </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
<!--                <tr>-->
<!--                    --><?php
//                    $widoktabelidzialy='';
//                    $widoktabelidzialy= new Widoki();
//                    $widoktabelidzialy->WidokDzialow();
//                    ?>
<!--                </tr>-->

<!--                </tbody>-->
<!--            </table>-->
<!--        </div>-->
    </div>
    <div class="col-md-4">
        <h2 class="text-center">Usuwanie rekordów z Tabeli "Działy"</h2>
        <?php
        $DRekord= '';
        if (isset($_POST['UsunRekordD'])){
            $DRekord = new Remove(strip_tags($_POST['DRekord']));
            $DRekord->RemoveDzial();
            echo '<script
    type="text/javascript">window.location.href="view.php";</script>';
        }

        ?>

        <div align="center">

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="ui form" style="margin-top: 134px">

                <label style="margin-top: 20px" for="Dzial" class="form-label">Wybierz Rekord</label>
                <select name="DRekord" class="form-select" id="DRekord" required style="width: 300px" >
                    <option value="" name="DRekord" id="DRekord"></option>
                    <?php
                    $SelectFirm = '';
                    $SelectFirm = new SELEKTY();
                    $SelectFirm->WyborDzialuDoUsuniecia();
                    ?>
                </select>
                <input style="margin-top: 20px" type="submit" class="ui primary button" id="UsunRekordD" name="UsunRekordD" value="Usuń Rekord"> </input>

            </form>
        </div>
    </div>
</div>




<h2 class="text-center">Tabela "Stanowiska"</h2>

<div class="row">
    <div class="col-md-4">
        <h2 class="text-center">Dodawanie rekordu do Tabeli "Stanowiska"</h2>
        <?php
        $stanowisko= '';

        if (isset($_POST['dodajStanowisko'])){
            $stanowisko = new AddSlownikowa(strip_tags($_POST['stanowisko']));
            $stanowisko->SendStToBase();
            echo '<script
    type="text/javascript">window.location.href="view.php";</script>';
        }

        ?>
        <form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="ui form" style="margin-top: 150px">
            <div class="required field">
                <label>Nazwa Stanowiska</label>
                <input type="text" name="stanowisko" id="stanowisko" required style="width: 400px;">
            </div>
            <input type="submit" class="ui primary button" id="dodajStanowisko" name="dodajStanowisko" value="Dodaj Stanowisko"></input>
        </form>
    </div>
    <div class="col-md-4">
        <h2 class="text-center">Widok Tabeli "Stanowiska"</h2>

<!--        <div class="table-responsive-md">-->
<!--            <table class="table table-hover table-bordered" id="Tabela_Stanowiska" >-->
<!--                <thead>-->
<!--                <tr>-->
<!---->
<!--                    <th scope="col">ID</th>-->
<!--                    <th width="90%" scope="col">Firma</th>-->
<!---->
<!--                </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
<!--                <tr>-->
<!--                    --><?php
//                    $widoktabelistanowiska='';
//                    $widoktabelistanowiska=new Widoki();
//                    $widoktabelistanowiska->WidokStanowisk();
//                    ?>
<!--                </tr>-->

<!--                </tbody>-->
<!--            </table>-->
<!--        </div>-->
    </div>
    <div class="col-md-4">
        <h2 class="text-center">Usuwanie rekordów z Tabeli "Stanowiska"</h2>
        <?php
        $SRekord= '';
        if (isset($_POST['UsunRekordS'])){
            $SRekord = new Remove(strip_tags($_POST['SRekord']));
            $SRekord->RemoveStanowisko();
            echo '<script
    type="text/javascript">window.location.href="view.php";</script>';
        }

        ?>

        <div align="center">

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="ui form" style="margin-top: 134px">

                <label style="margin-top: 20px" for="Stanowisko" class="form-label">Wybierz Rekord</label>
                <select name="SRekord" class="form-select" id="SRekord" required style="width: 300px" >
                    <option value="" name="SRekord" id="SRekord"></option>
                    <?php
                    $SelectFirm = '';
                    $SelectFirm = new SELEKTY();
                    $SelectFirm->WyborStanowiskaDoUsuniecia();
                    ?>
                </select>
                <input style="margin-top: 20px" type="submit" class="ui primary button" id="UsunRekordS" name="UsunRekordS" value="Usuń Rekord"> </input>

            </form>
        </div>
    </div>
</div>

<!--   Tabela Firmy   -->
<h2 class="text-center">Widok Tabeli "Firmy"</h2>
<div class="table-responsive-md">
    <table class="table table-hover table-bordered" id="Tabela_Firmy" >

        </tbody>
    </table>
</div>

<!--   Tabela Oddzialy   -->

<h2 class="text-center">Widok Tabeli "Oddziały"</h2>
<div class="table-responsive-md">
    <table class="table table-hover table-bordered" id="Tabela_Oddzialy" >


        </tbody>
    </table>
</div>

<!--   Tabela Dzialy   -->

<h2 class="text-center">Widok Tabeli "Działy"</h2>
<div class="table-responsive-md">
    <table class="table table-hover table-bordered" id="Tabela_Dzialy" >

        </tbody>
    </table>
</div>

<!--   Tabela Satnowiska   -->

<h2 class="text-center">Widok Tabeli "Stanowiska"</h2>
<div class="table-responsive-md">
    <table class="table table-hover table-bordered" id="Tabela_Stanowiska" >
        </tbody>
    </table>
</div>







</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
<script src="http://localhost/projek2/Test-Praca/Firmy.js"></script>
<script src="http://localhost/projek2/Test-Praca/Dzialy.js"></script>
<script src="http://localhost/projek2/Test-Praca/Oddzialy.js"></script>
<script src="http://localhost/projek2/Test-Praca/Stanowiska.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>
<div class="allButFooter">
</div>
<footer style="position: sticky">
    <button type="button" class="btn btn-link" onclick="location.href='contacts.php';">Kontakty</button>
</footer>
</body>
</html>