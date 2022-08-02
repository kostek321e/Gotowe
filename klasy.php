<?php
include('connect.php');


/*
 * -------------------------------------------------
 *
 *                      Management
 *
 * -------------------------------------------------
 */




class GlownaADD{
    public $firm2;
    public $Imie;
    public $Nazwisko;
    public $Oddzial;
    public $Dzial;
    public $Stanowisko;
    public $NrKomorkowy;
    public $NrStacjonarny;
    public $email;
    public function __construct(string $Imie,string $Nazwisko,string $firm2,string $Oddzial,string $Dzial,string $Stanowisko,string $NrStacjonarny,string $NrKomorkowy,string $email)
    {
        $this->Imie = $Imie;
        $this->Nazwisko = $Nazwisko;
        $this->firm2 = $firm2;
        $this->Oddzial = $Oddzial;
        $this->Dzial = $Dzial;
        $this->Stanowisko = $Stanowisko;
        $this->NrStacjonarny = $NrStacjonarny;
        $this->NrKomorkowy = $NrKomorkowy;
        $this->email = $email;
    }
    public function SendToBase(){
        global $mysqli;
        $statement = $mysqli->prepare("INSERT glowna (Imie,Nazwisko,Firma,Oddzial,Dzial,Stanowisko,numerStacjonarny,numerKomorkowy,adresEmail) VALUES (?,?,?,?,?,?,?,?,?)");
        $statement->bind_param("sssssssss", $this->Imie, $this->Nazwisko, $this->firm2, $this->Oddzial, $this->Dzial, $this->Stanowisko, $this->NrStacjonarny, $this->NrKomorkowy, $this->email);
        $statement->execute();
        $statement->close();

    }

}

class Firma {
    public $firma;
    public function __construct(string $firma)
    {
       $this->firma = $firma;
    }
    public function SendFirmToBase(){
            global $mysqli;
            $statement = $mysqli->prepare("INSERT firmy (Firma) VALUES (?)");
            $statement->bind_param("s", $this->firma);
            $statement->execute();
            $statement->close();

    }
}

class Oddzial {
    public $oddzial;
    public function __construct(string $oddzial)
    {
        $this->oddzial = $oddzial;
    }
    public function SendDeparToBase(){
        global $mysqli;
        $statement = $mysqli->prepare("INSERT oddzialy (Oddzial) VALUES (?)");
        $statement->bind_param("s", $this->oddzial);
        $statement->execute();
        $statement->close();

    }
}

class Dzial {
    public $Dzial;
    public function __construct(string $Dzial)
    {
        $this->Dzial = $Dzial;
    }
    public function SendSecToBase(){
        global $mysqli;
        $statement = $mysqli->prepare("INSERT dzialy (Dzial) VALUES (?)");
        $statement->bind_param("s", $this->Dzial);
        $statement->execute();
        $statement->close();

    }
}

class Stanowisko {
    public $Stanowisko;
    public function __construct(string $Stanowisko)
    {
        $this->Stanowisko = $Stanowisko;
    }
    public function SendStToBase(){
        global $mysqli;
        $statement = $mysqli->prepare("INSERT stanowiska (stanowisko) VALUES (?)");
        $statement->bind_param("s", $this->Stanowisko);
        $statement->execute();
        $statement->close();

    }
}

class RecordRemove{
    public $rekord;
    public function __construct(string $rekord)
    {
        $this->rekord = $rekord;
    }
    public function RemoveRecord(){
        global $mysqli;
        $statement = $mysqli->prepare("DELETE FROM glowna WHERE ID = ? LIMIT 1 ");
        $statement->bind_param("i", $this->rekord);
        $statement->execute();
        $statement->close();

    }
}


/*
 * -------------------------------------------------
 *
 *                      WIDOKI
 *
 * -------------------------------------------------
 */

class Widoki{

    public function WidokGlownej(){
        global $mysqli;
        global $glowna;
        foreach ($mysqli->query($glowna) as $row) {
            echo '<tr>';
            echo '<td>'. $row['id'] . '</td>';
            echo '<td>'. $row['Imie'] . '</td>';
            echo '<td>'. $row['Nazwisko'] . '</td>';
            echo '<td>'. $row['Firma'] . '</td>';
            echo '<td>'. $row['Oddzial'] . '</td>';
            echo '<td>'. $row['Dzial'] . '</td>';
            echo '<td>'. $row['Stanowisko'] . '</td>';
            echo '<td>'. $row['numerStacjonarny'] . '</td>';
            echo '<td>'. $row['numerKomorkowy'] . '</td>';
            echo '<td>'. $row['adresEmail'] . '</td>';
            echo '</tr>';
        }

    }
    public function WidokFirm(){
        global $mysqli;
        global $firmy;
        foreach ($mysqli->query($firmy) as $row) {
            echo '<tr>';
            echo '<td>'. $row['id'] . '</td>';
            echo '<td>'. $row['Firma'] . '</td>';
            echo '</tr>';
        }
    }
    public function WidokOddzialow(){
        global $mysqli;
        global $Oddzialy;
        foreach ($mysqli->query($Oddzialy) as $row) {
            echo '<tr>';
            echo '<td>'. $row['id'] . '</td>';
            echo '<td>'. $row['Oddzial'] . '</td>';
            echo '</tr>';
        }

    }
    public function WidokDzialow(){
        global $mysqli;
        global $dzialy;
        foreach ($mysqli->query($dzialy) as $row) {
            echo '<tr>';
            echo '<td>'. $row['id'] . '</td>';
            echo '<td>'. $row['Dzial'] . '</td>';
            echo '</tr>';
        }

    }
    public function WidokStanowisk(){
        global $mysqli;
        global $stanowiska;
        foreach ($mysqli->query($stanowiska) as $row) {
            echo '<tr>';
            echo '<td>'. $row['id'] . '</td>';
            echo '<td>'. $row['stanowisko'] . '</td>';
            echo '</tr>';
        }
    }

}


/*
 * -------------------------------------------------
 *
 *                      SELEKTY
 *
 * -------------------------------------------------
 */

class SELEKTY{

    public function WyborFirmy(){
        global $mysqli;
        $Firmquery = "SELECT Firma FROM firmy ORDER BY id ASC";
        $Firmresult = $mysqli->query($Firmquery);

        foreach ($Firmresult as $row)
        {
            echo '<option value="'.$row["Firma"].'">'.$row["Firma"].'</option>';
        }
    }

    public function WyborOddzialu(){
        global $mysqli;
        $Oddquery = "SELECT Oddzial FROM oddzialy ORDER BY id ASC";
        $Oddmresult = $mysqli->query($Oddquery);

        foreach ($Oddmresult as $row)
        {
            echo '<option value="'.$row["Oddzial"].'">'.$row["Oddzial"].'</option>';
        }
    }

    public function WyborDzialu(){
        global $mysqli;
        $Dzquery = "SELECT Dzial FROM dzialy ORDER BY id ASC";
        $Dzresult = $mysqli->query($Dzquery);

        foreach ($Dzresult as $row)
        {
            echo '<option value="'.$row["Dzial"].'">'.$row["Dzial"].'</option>';
        }
    }

    public function WyborStanowiska(){
        global $mysqli;
        $Stmquery = "SELECT stanowisko FROM stanowiska ORDER BY id ASC";
        $Stresult = $mysqli->query($Stmquery);

        foreach ($Stresult as $row)
        {
            echo '<option value="'.$row["stanowisko"].'">'.$row["stanowisko"].'</option>';
        }
    }

    public function WyborRekordu(){
        global $mysqli;
        $GLquery = "SELECT * FROM glowna ORDER BY id ASC";
        $GLresult = $mysqli->query($GLquery);

        foreach ($GLresult as $row)
        {
            echo '<option value="'.$row["id"].'.'.$row["Imie"].'.'.$row["Nazwisko"].'.'.$row["Firma"].'.'.$row["Oddzial"].'.'.$row["Dzial"].'.'.$row["Stanowisko"].'.'.$row["numerStacjonarny"].'.'.$row["numerKomorkowy"].'.'.$row["adresEmail"].'">'.$row["id"].'  '.$row["Imie"].'  '.$row["Nazwisko"].'  '.$row["Firma"].'  '.$row["Oddzial"].'  '.$row["Dzial"].'  '.$row["Stanowisko"].'  '.$row["numerStacjonarny"].'  '.$row["numerKomorkowy"].'  '.$row["adresEmail"].'</option>';
        }
    }




}










