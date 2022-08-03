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
        .allButFooter {
            min-height: calc(90vh - 95px);
        }
    </style>
</head>
<body>
<h2 style="margin-top: 20px" class="text-center">Kontakty</h2>

<div class="container-lg my-5">
    <div class="row">
        <div class="col-md-4"><button type="button" class="btn btn-lg" onclick="location.href='index.php';">Strona główna</button>
        </div>
        <div class="col-md-4"><button type="button" class="btn btn-lg" onclick="location.href='view.php';">Tabele Słownikowe</button></div>
        <div class="col-md-4"><button type="button" class="btn btn-lg" onclick="location.href='management.php';">Zarządzanie</button></div>
    </div>

</div>

<h2 class="text-center">Widok Tabeli Kontakty</h2>

<div class="table-responsive-md">
    <table class="table table-hover table-bordered table-dark" style="width: 1400px; "align="center" >
        <thead>
        <tr>

            <th scope="col">ID</th>
            <th scope="col">Imie</th>
            <th scope="col">Nazwisko</th>
            <th scope="col">Firma</th>
            <th scope="col">Oddzial</th>
            <th scope="col">Dzial</th>
            <th scope="col">Stanowisko</th>
            <th scope="col">numer stacjonarny</th>
            <th scope="col">numer komorkowy</th>
            <th scope="col">adres email</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <?php
            $widoktabeliglownej='';
            $widoktabeliglownej = new Widoki();
            $widoktabeliglownej->WidokKontakty();
            ?>
        </tr>

        </tbody>
    </table>
</div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>

<div class="allButFooter">
</div>
<footer style="position: sticky">
    <button type="button" class="btn btn-link" onclick="location.href='contacts.html';">Kontakty</button>
</footer>
</body>
</html>