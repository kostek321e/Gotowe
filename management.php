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
        form{
            width: 30%;

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
<h2 style="margin-top: 20px" class="text-center"">Zarządzanie</h2>

<div class="container-lg my-5">
    <div class="row">
        <div class="col-md-6"><button type="button" class="btn btn-lg" onclick="location.href='index.php';">Strona główna</button>
        </div>
        <div class="col-md-6"><button type="button" class="btn btn-lg" onclick="location.href='view.php';">Widok Tabelaryczny</button></div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>


<h2 class="text-center">Dodawanie rekordow do Tabeli Głównej</h2>
<?php
include('klasy.php');
include('connect.php');
$glowna = '';
$check1 = '';
$check2 = '';
$check3 = '';
$errorNrKomorkowy='';
$errorNrStacjonarny='';
$errorEmail='';
$TelReg = '/^[0-9\+]{9}$/';
if (isset($_POST['dodajRekord'])) {
    $check1 = strip_tags($_POST['NrStacjonarny']);
    $check2 = strip_tags($_POST['NrKomorkowy']);
    $check3 = strip_tags($_POST['email']);
    $glowna = new GlownaADD(strip_tags($_POST['Imie']),
        strip_tags($_POST['Nazwisko']),
        strip_tags($_POST['Firma']),
        strip_tags($_POST['Oddzial']),
        strip_tags($_POST['Dzial']),
        strip_tags($_POST['Stanowisko']),
        strip_tags($_POST['NrStacjonarny']),
        strip_tags($_POST['NrKomorkowy']),
        strip_tags($_POST['email']));
    if (!$check1 || preg_match($TelReg, $check1)) {
        if (!$check2 || preg_match($TelReg, $check2)) {
            if (filter_var($check3, FILTER_VALIDATE_EMAIL) || !$check3) {
    $glowna->SendToBase();
    echo 'WYSLANO';
            } else {
                $errorEmail = 'Niepoprawny email';
            }
        }else {
            $errorNrKomorkowy = 'Niepoprawny Numer Komórkowy';
        }
    }else{
        $errorNrStacjonarny = 'Niepoprawny Numer Stacjonarny';
    }
}
?>


<div align="center">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="ui form" style="width: 100%">
<div class="col-md-3">
    <label for="gora" class="form-label"><h2>Dodawanie rekordow do Tabeli Głównej</h2></label>
    <div class="row">
    <div class="col-md-6">
        <label for="Imie" class="form-label">Imie</label>
        <input
                type="text"
               class="form-control"
                name="Imie"
               id="Imie"
               required
        >
    </div>
        <div class="col-md-6">
            <label for="Nazwisko" class="form-label">Nazwisko</label>
            <input
                    type="text"
                    class="form-text"
                    name="Nazwisko"
                    id="Nazwisko"
                    required
            />
            <div class="invalid-feedback">Uzupełnij Pole Imie</div>
        </div>
    </div>


    <label style="margin-top: 20px" for="Firma" class="form-label">Wybierz Firme</label>
<select name="Firma" class="form-select" id="Firma" required>
    <option value=""></option>
    <?php
    $SelectFirm = '';
    $SelectFirm = new SELEKTY();
    $SelectFirm->WyborFirmy();
    ?>


</select>
    <label for="Oddzial" class="form-label">Wybierz Oddzial</label>
    <select name="Oddzial" class="form-select" id="Oddzial" required>
        <option value=""></option>
        <?php
        $SelectOddzial= '';
        $SelectOddzial= new SELEKTY();
        $SelectOddzial->WyborOddzialu();
        ?>

    </select>

    <label for="Dzial" class="form-label">Wybierz Dzial</label>
    <select name="Dzial" class="form-select" id="Dzial">
        <option value=""></option>
        <?php
        $SelectDzial='';
        $SelectDzial= new SELEKTY();
        $SelectDzial->WyborDzialu();
        ?>
    </select>

    <label for="Stanowisko" class="form-label">Wybierz Stanowisko</label>
    <select name="Stanowisko" class="form-select" id="Stanowisko" required>
        <option value=""></option>
        <?php
        $SelectStanowisko='';
        $SelectStanowisko= new SELEKTY();
        $SelectStanowisko->WyborStanowiska();
        ?>

    </select>
    <div style="margin-top: 20px" class="row">
        <div class="col-md-6">
            <label for="NrStacjonarny" class="form-label">Numer stacjonarny</label>
            <input
                    type="text"
                    class="form-control"
                    name="NrStacjonarny"
                    id="NrStacjonarny"
            />
            <?php if ($errorNrStacjonarny != null){ ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $errorNrStacjonarny; ?>
                </div>
            <?php } ?>
        </div>
        <div class="col-md-6">
            <label for="NrKomorkowy" class="form-label">Numer Komorkowy</label>
            <input
                    type="text"
                    class="form-control"
                    name="NrKomorkowy"
                    id="NrKomorkowy"
            />
            <?php if ($errorNrKomorkowy != null){ ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $errorNrKomorkowy; ?>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="container">
        <label style="margin-top: 20px" for="email" class="form-label">adres email</label>
        <input
                type="text"
                class="form-control"
                name="email"
                id="email"
        />
        <?php if ($errorEmail != null){ ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorEmail; ?>
            </div>
        <?php } ?>
    </div>



    <input  style="margin-top: 20px" type="submit" class="ui primary button" id="dodajRekord" name="dodajRekord" value="Dodaj Rekord">

</div>
</form>
</div>

<h2 class="text-center">Dodawanie rekordow do Tabeli Firmy</h2>
<?php
$firmaa= '';
if (isset($_POST['dodajFirme'])){
    $firmaa = new Firma(strip_tags($_POST['firm']));
    $firmaa->SendFirmToBase();
}
?>
<form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="ui form" style="margin-left: 650px">
    <div class="required field">
        <label>Nazwa Firmy</label>
        <input type="text" name="firm" id="firm" required>
    </div>
    <input type="submit" class="ui primary button" id="dodajFirme" name="dodajFirme" value="Dodaj Firme"> </input>
</form>


<h2 class="text-center">Dodawanie rekordow do Tabeli Oddzialy</h2>
<?php
$oddzial= '';
if (isset($_POST['dodajOddzial'])){
    $oddzial = new Oddzial(strip_tags($_POST['oddzial']));
    $oddzial->SendDeparToBase();
}

?>
<form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="ui form" style="margin-left: 650px">
    <div class="required field">
        <label>Nazwa Oddziału</label>
        <input type="text" name="oddzial" id="oddzial" required>
    </div>
    <input type="submit" class="ui primary button" id="dodajOddzial" name="dodajOddzial" value="Dodaj Oddział"> </input>
</form>



<h2 class="text-center">Dodawanie rekordow do Tabeli Dzialy</h2>
<?php
$dzial= '';
if (isset($_POST['dodajDzial'])){
    $dzial = new Dzial(strip_tags($_POST['dzial']));
    $dzial->SendSecToBase();
}
?>
<form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="ui form" style="margin-left: 650px">
    <div class="required field">
        <label>Nazwa Działu</label>
        <input type="text" name="dzial" id="dzial" required>
    </div>
    <input type="submit" class="ui primary button" id="dodajDzial" name="dodajDzial" value="Dodaj Dział"></input>
</form>



<h2 class="text-center">Dodawanie rekordow do Tabeli Stanowiska</h2>
<?php
$stanowisko= '';

if (isset($_POST['dodajStanowisko'])){
$stanowisko = new Stanowisko(strip_tags($_POST['stanowisko']));
$stanowisko->SendStToBase();
}

?>
<form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="ui form" style="margin-left: 650px">
    <div class="required field">
        <label>Nazwa Stanowiska</label>
        <input type="text" name="stanowisko" id="stanowisko" required>
    </div>
    <input type="submit" class="ui primary button" id="dodajStanowisko" name="dodajStanowisko" value="Dodaj Stanowisko"></input>
</form>


<?php
$URekord= '';
if (isset($_POST['UsunRekord'])){
   $URekord = new RecordRemove(strip_tags($_POST['URekord']));
   $URekord->RemoveRecord();
}

?>

<div align="center">
<h2 style="margin-top: 20px" class="text-center">Usuwanie rekordow z tabeli głównej</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="ui form" style="width: 100%">
    <div class="col-md-3">
<label style="margin-top: 20px" for="Firma" class="form-label">Wybierz Rekord</label>
        <select name="URekord" class="form-select" id="URekord" required>
            <option value="" name="URekord" id="URekord"></option>
            <?php
            $SelectRekord='';
            $SelectRekord= new SELEKTY();
            $SelectRekord->WyborRekordu();
            ?>
        </select>
        <input style="margin-top: 20px" type="submit" class="ui primary button" id="UsunRekord" name="UsunRekord" value="Usuń Rekord"> </input>
    </div>
</form>
</div>


<div class="allButFooter">
</div>
<footer style="position: sticky" >
    <button type="button" class="btn btn-link" onclick="location.href='contacts.html';">Kontakty</button>
</footer>
</body>
</html>