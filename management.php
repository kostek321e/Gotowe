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
    </style>
</head>
<body>
<h2 style="margin-top: 20px" class="text-center"">Zarządzanie</h2>

<div class="container-lg my-5">
    <div class="row">
        <div class="col-md-4"><button type="button" class="btn btn-lg" onclick="location.href='index.php';">Strona główna</button>
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-link btn-lg"  onclick="location.href='contacts.php';">Kontakty</button>
        </div>
        <div class="col-md-4"><button type="button" class="btn btn-lg" onclick="location.href='view.php';">Tabele Słownikowe</button></div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>


<h2 class="text-center">Zarządzanie Kontaktami</h2>
<?php
include('klasy.php');
include('connect.php');
$imie='';
$naziwsko='';
$imie2='';
$naziwsko2='';
$firma1='';
$oddzial1='';
$dzial1='';
$stanowisko1='';
$nrstacjonarny='';
$nrkomorkowy='';
$email='';
$nrstacjonarny2='';
$nrkomorkowy2='';
$email2='';
$kontakty = '';
$errorNrKomorkowy='';
$errorNrStacjonarny='';
$errorEmail='';
$errorNrKomorkowy2='';
$errorNrStacjonarny2='';
$errorEmail2='';
$TelReg = '/^[0-9\+]{9}$/';
if (isset($_POST['dodajRekord'])) {
    $imie=strip_tags($_POST['Imie']);
    $naziwsko=strip_tags($_POST['Nazwisko']);
    $firma1=strip_tags($_POST['Firma']);
    $oddzial1=strip_tags($_POST['Oddzial']);
    $dzial1=strip_tags($_POST['Dzial']);
    $stanowisko1=strip_tags($_POST['Stanowisko']);
    $nrstacjonarny=strip_tags($_POST['NrStacjonarny']);
    $nrkomorkowy=strip_tags($_POST['NrKomorkowy']);
    $email=strip_tags($_POST['email']);
    $testStacjonarny=(!$nrstacjonarny || preg_match($TelReg, $nrstacjonarny));
    $testKomorkowy=(!$nrkomorkowy || preg_match($TelReg, $nrkomorkowy));
    $testEmail=(filter_var($email, FILTER_VALIDATE_EMAIL) || !$email);
    $kontakty = new kontakty(null,$imie, $naziwsko, $firma1, $oddzial1, $dzial1, $stanowisko1, $nrstacjonarny, $nrkomorkowy, $email);
    if ($testStacjonarny && $testKomorkowy && $testEmail) {
        $kontakty->SendToBase();
        header("Location: management.php");
    }
    else
    {
        if($testStacjonarny) {

        }else{
            $errorNrStacjonarny = 'Niepoprawny Numer Stacjonarny';
        }
        if($testKomorkowy) {

        }else{
            $errorNrKomorkowy = 'Niepoprawny Numer Komórkowy';
        }
        if($testEmail) {

        }else{
            $errorEmail = 'Niepoprawny email';
        }

    }
}
if (isset($_POST['EdytujRekord'])){
    $imie2=strip_tags($_POST['Imie2']);
    $naziwsko2=strip_tags($_POST['Nazwisko2']);
    $firma1=strip_tags($_POST['Firma']);
    $oddzial1=strip_tags($_POST['Oddzial']);
    $dzial1=strip_tags($_POST['Dzial']);
    $stanowisko1=strip_tags($_POST['Stanowisko']);
    $nrstacjonarny2=strip_tags($_POST['NrStacjonarny2']);
    $nrkomorkowy2=strip_tags($_POST['NrKomorkowy2']);
    $email2=strip_tags($_POST['email2']);
    $id=strip_tags($_POST['KontaktToChange']);
    $testStacjonarny2=(!$nrstacjonarny2 || preg_match($TelReg, $nrstacjonarny2));
    $testKomorkowy2=(!$nrkomorkowy2 || preg_match($TelReg, $nrkomorkowy2));
    $testEmail2=(filter_var($email2, FILTER_VALIDATE_EMAIL) || !$email2);
    $kontakty = new kontakty($id ,$imie2, $naziwsko2, $firma1, $oddzial1, $dzial1, $stanowisko1, $nrstacjonarny2, $nrkomorkowy2, $email2);
    if ($testStacjonarny2 && $testKomorkowy2 && $testEmail2) {
        $kontakty->UpdateBase();
        header("Location: management.php");
    }
    else
    {
        if($testStacjonarny2) {

        }else{
            $errorNrStacjonarny2 = 'Niepoprawny Numer Stacjonarny';
        }
        if($testKomorkowy2) {

        }else{
            $errorNrKomorkowy2 = 'Niepoprawny Numer Komórkowy';
        }
        if($testEmail2) {

        }else{
            $errorEmail2 = 'Niepoprawny email';
        }

    }
}
?>


<div class="row">
    <div class="col-md-4">
        <div align="center">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="ui form" style="width: 100%">
                <div class="col-md-10">
                    <label for="gora" class="form-label"><h2>Edycja Rekordów tabeli Kontakty</h2></label>
                    <label for="KontaktToChange" class="form-label">Wybierz Kontakt</label>
                    <select name="KontaktToChange" class="form-select" id="KontaktToChange" required style="margin-bottom: 40px">
                        <option value=""></option>
                        <?php
                        $SelectKontaktToChange='';
                        $SelectKontaktToChange= new SELEKTY();
                        $SelectKontaktToChange->WyborIdKontaktu();
                        ?>

                    </select>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="Imie2" class="form-label">Imie</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    name="Imie2"
                                    id="Imie2"
                                    required
                                    value="<?php echo $imie2 ?>"
                            >
                        </div>
                        <div class="col-md-6">
                            <label for="Nazwisko2" class="form-label">Nazwisko</label>
                            <input
                                    type="text"
                                    class="form-text"
                                    name="Nazwisko2"
                                    id="Nazwisko2"
                                    required
                                    value="<?php echo $naziwsko2 ?>"
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
                    <select name="Stanowisko" class="form-select" id="Stanowisko" required >
                        <option value=""></option>
                        <?php
                        $SelectStanowisko='';
                        $SelectStanowisko= new SELEKTY();
                        $SelectStanowisko->WyborStanowiska();
                        ?>

                    </select>
                    <div style="margin-top: 20px" class="row">
                        <div class="col-md-6">
                            <label for="NrStacjonarny2" class="form-label">Numer stacjonarny</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    name="NrStacjonarny2"
                                    id="NrStacjonarny2"
                                    value="<?php echo $nrstacjonarny2 ?>"
                            />
                            <?php if ($errorNrStacjonarny2 != null){ ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $errorNrStacjonarny2; ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-6">
                            <label for="NrKomorkowy2" class="form-label">Numer Komorkowy</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    name="NrKomorkowy2"
                                    id="NrKomorkowy2"
                                    value="<?php echo $nrkomorkowy2 ?>"
                            />
                            <?php if ($errorNrKomorkowy2 != null){ ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $errorNrKomorkowy2; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="container">
                        <label style="margin-top: 20px" for="email2" class="form-label">adres email</label>
                        <input
                                type="text"
                                class="form-control"
                                name="email2"
                                id="email2"
                                value="<?php echo $email2 ?>"
                        />
                        <?php if ($errorEmail2 != null){ ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $errorEmail2; ?>
                            </div>
                        <?php } ?>
                    </div>



                    <input  style="margin-top: 20px" type="submit" class="ui primary button" id="EdytujRekord" name="EdytujRekord" value="Edytuj Rekord">

                </div>
            </form>
        </div>
    </div>
    <div class="col-md-4">
        <div align="center"  >
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="ui form" style="width: 2000px">
                <div class="col-md-10">
                    <label for="gora" class="form-label"><h2>Dodawanie rekordow do Tabeli Kontakty</h2></label>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="Imie" class="form-label">Imie</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    name="Imie"
                                    id="Imie"
                                    required
                                    value="<?php echo $imie ?>"
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
                                    value="<?php echo $naziwsko ?>"
                            />
                            <div class="invalid-feedback">Uzupełnij Pole Imie</div>
                        </div>
                    </div>


                    <label style="margin-top: 20px" for="Firma" class="form-label">Wybierz Firme</label>
                    <select name="Firma" class="form-select" id="Firma" required >
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
                    <select name="Dzial" class="form-select" id="Dzial" >
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
                                    value="<?php echo $nrstacjonarny ?>"
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
                                    value="<?php echo $nrkomorkowy ?>"
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
                                value="<?php echo $email ?>"
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
    </div>


    <?php
    $URekord= '';
    $id2='';
    if (isset($_POST['UsunRekord'])){
        $id2=strip_tags($_POST['URekord']);
        $URekord = new Kontakty($id2,'','','','','','','','','');
        $URekord->RemoveKontakt();
    }

    ?>
    <div class="col-md-4">
    <div align="center">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="ui form" style="width: 100%">
            <div class="col-md-10">
                <h2 style="margin-top: 20px" class="text-center">Usuwanie rekordow z tabeli Kontakty</h2>
                <label style="margin-top: 20px" for="Firma" class="form-label">Wybierz Rekord</label>
                <select name="URekord" class="form-select" id="URekord" required>
                    <option value="" name="URekord" id="URekord"></option>
                    <?php
                    $SelectRekord='';
                    $SelectRekord= new SELEKTY();
                    $SelectRekord->WyborKontaktu();
                    ?>
                </select>
                <input style="margin-top: 20px" type="submit" class="ui primary button" id="UsunRekord" name="UsunRekord" value="Usuń Rekord"> </input>
            </div>
        </form>
    </div>
    </div>

    </div>
</div>



















































<footer style="position: sticky" >
    <button type="button" class="btn btn-info" onclick=location.href='contacts.php'>Kontakty</button>
</footer>
</body>
</html>