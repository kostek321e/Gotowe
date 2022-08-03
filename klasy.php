<?php
include('connect.php');


/*
 * -------------------------------------------------
 *
 *                      klasa Kontakty
 *
 * -------------------------------------------------
 */




class kontakty{
    public $firm2;
    public $Imie;
    public $Nazwisko;
    public $Oddzial;
    public $Dzial;
    public $Stanowisko;
    public $NrKomorkowy;
    public $NrStacjonarny;
    public $email;
    public $id;
    public function __construct($id ,string $Imie,string $Nazwisko,string $firm2,string $Oddzial,string $Dzial,string $Stanowisko,string $NrStacjonarny,string $NrKomorkowy,string $email)
    {
        $this->id = $id;
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
    public function UpdateBase(){
        global $mysqli;
        $statement = $mysqli->prepare("UPDATE glowna SET Imie='$this->Imie',Nazwisko='$this->Nazwisko',Firma='$this->firm2',Oddzial='$this->Oddzial',Dzial='$this->Dzial',Stanowisko='$this->Stanowisko',numerStacjonarny='$this->NrStacjonarny',numerKomorkowy='$this->NrKomorkowy',adresEmail='$this->email' WHERE ID = '$this->id' LIMIT 1 ");
        $statement->bind_param("sssssssssi", $this->Imie, $this->Nazwisko, $this->firm2, $this->Oddzial, $this->Dzial, $this->Stanowisko, $this->NrStacjonarny, $this->NrKomorkowy, $this->email,$this->id);
        $statement->execute();
        $statement->close();


    }
    public function RemoveKontakt(){
        global $mysqli;
        $statement = $mysqli->prepare("DELETE FROM glowna WHERE ID = ? LIMIT 1 ");
        $statement->bind_param("i", $this->id);
        $statement->execute();
        $statement->close();

    }

}


/*
 * -------------------------------------------------
 *
 *                      Dodawanie
 *
 * -------------------------------------------------
 */



class AddSlownikowa {
    public $name;
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function SendFirmaToBase(){
        global $mysqli;
        $statement = $mysqli->prepare("INSERT firmy (Firma) VALUES (?)");
        $statement->bind_param("s", $this->name);
        $statement->execute();
        $statement->close();



    }

    public function SendDeparToBase(){
        global $mysqli;
        $statement = $mysqli->prepare("INSERT oddzialy (Oddzial) VALUES (?)");
        $statement->bind_param("s", $this->name);
        $statement->execute();
        $statement->close();


    }

    public function SendSecToBase(){
        global $mysqli;
        $statement = $mysqli->prepare("INSERT dzialy (Dzial) VALUES (?)");
        $statement->bind_param("s", $this->name);
        $statement->execute();
        $statement->close();

    }

    public function SendStToBase(){
        global $mysqli;
        $statement = $mysqli->prepare("INSERT stanowiska (stanowisko) VALUES (?)");
        $statement->bind_param("s", $this->name);
        $statement->execute();
        $statement->close();

    }
}
/*
 * -------------------------------------------------
 *
 *                    Usuwanie
 *
 * -------------------------------------------------
 */


class Remove{
    public $rekord;
    public function __construct(string $rekord)
    {
        $this->rekord = $rekord;
    }
    public function RemoveFirma(){
        global $mysqli;
        $statement = $mysqli->prepare("DELETE FROM firmy WHERE ID = ? LIMIT 1 ");
        $statement->bind_param("i", $this->rekord);
        $statement->execute();
        $statement->close();
    }
    public function RemoveOddzial(){
        global $mysqli;
        $statement = $mysqli->prepare("DELETE FROM oddzialy WHERE ID = ? LIMIT 1 ");
        $statement->bind_param("i", $this->rekord);
        $statement->execute();
        $statement->close();
    }
    public function RemoveDzial(){
        global $mysqli;
        $statement = $mysqli->prepare("DELETE FROM dzialy WHERE ID = ? LIMIT 1 ");
        $statement->bind_param("i", $this->rekord);
        $statement->execute();
        $statement->close();
    }
    public function RemoveStanowisko(){
        global $mysqli;
        $statement = $mysqli->prepare("DELETE FROM stanowiska WHERE ID = ? LIMIT 1 ");
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

    public function WidokKontakty(){
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

    public function WyborFirmyDoUsuniecia(){
        global $mysqli;
        $Firmquery = "SELECT * FROM firmy ORDER BY id ASC";
        $Firmresult = $mysqli->query($Firmquery);

        foreach ($Firmresult as $row)
        {
            echo '<option value="'.$row["id"].'.'.$row["Firma"].'">'.$row["id"].'.'.$row["Firma"].'</option>';
        }
    }

    public function WyborOddzialuDoUsuniecia(){
        global $mysqli;
        $Oddquery = "SELECT * FROM oddzialy ORDER BY id ASC";
        $Oddmresult = $mysqli->query($Oddquery);

        foreach ($Oddmresult as $row)
        {
            echo '<option value="'.$row["id"].'.'.$row["Oddzial"].'">'.$row["id"].'.'.$row["Oddzial"].'</option>';
        }
    }

    public function WyborDzialuDoUsuniecia(){
        global $mysqli;
        $Dzquery = "SELECT * FROM dzialy ORDER BY id ASC";
        $Dzresult = $mysqli->query($Dzquery);

        foreach ($Dzresult as $row)
        {
            echo '<option value="'.$row["id"].'.'.$row["Dzial"].'">'.$row["id"].'.'.$row["Dzial"].'</option>';
        }
    }

    public function WyborStanowiskaDoUsuniecia(){
        global $mysqli;
        $Stmquery = "SELECT * FROM stanowiska ORDER BY id ASC";
        $Stresult = $mysqli->query($Stmquery);

        foreach ($Stresult as $row)
        {
            echo '<option value="'.$row["id"].'.'.$row["stanowisko"].'">'.$row["id"].'.'.$row["stanowisko"].'</option>';
        }
    }




        public function WyborIdKontaktu(){
        global $mysqli;
        $GLiquery = "SELECT * FROM glowna ORDER BY id ASC";
        $GLiresult = $mysqli->query($GLiquery);

        foreach ($GLiresult as $row)
        {
            echo '<option value="'.$row["id"].'.'.$row["Imie"].'.'.$row["Nazwisko"].'.'.$row["Firma"].'.'.$row["Oddzial"].'.'.$row["Dzial"].'.'.$row["Stanowisko"].'.'.$row["numerStacjonarny"].'.'.$row["numerKomorkowy"].'.'.$row["adresEmail"].'">'.$row["id"].'  '.$row["Imie"].'  '.$row["Nazwisko"].'  '.$row["Firma"].'  '.$row["Oddzial"].'  '.$row["Dzial"].'  '.$row["Stanowisko"].'  '.$row["numerStacjonarny"].'  '.$row["numerKomorkowy"].'  '.$row["adresEmail"].'</option>';
        }
    }

    public function WyborKontaktu(){
        global $mysqli;
        $GLquery = "SELECT * FROM glowna ORDER BY id ASC";
        $GLresult = $mysqli->query($GLquery);

        foreach ($GLresult as $row)
        {
            echo '<option value="'.$row["id"].'.'.$row["Imie"].'.'.$row["Nazwisko"].'.'.$row["Firma"].'.'.$row["Oddzial"].'.'.$row["Dzial"].'.'.$row["Stanowisko"].'.'.$row["numerStacjonarny"].'.'.$row["numerKomorkowy"].'.'.$row["adresEmail"].'">'.$row["id"].'  '.$row["Imie"].'  '.$row["Nazwisko"].'  '.$row["Firma"].'  '.$row["Oddzial"].'  '.$row["Dzial"].'  '.$row["Stanowisko"].'  '.$row["numerStacjonarny"].'  '.$row["numerKomorkowy"].'  '.$row["adresEmail"].'</option>';
        }
    }
    public function WyborFirmy(){
        global $mysqli;
        $Firmquery = "SELECT * FROM firmy ORDER BY id ASC";
        $Firmresult = $mysqli->query($Firmquery);

        foreach ($Firmresult as $row)
        {
            echo '<option value="'.$row["Firma"].'">'.$row["Firma"].'</option>';
        }
    }

    public function WyborOddzialu(){
        global $mysqli;
        $Oddquery = "SELECT * FROM oddzialy ORDER BY id ASC";
        $Oddmresult = $mysqli->query($Oddquery);

        foreach ($Oddmresult as $row)
        {
            echo '<option value="'.$row["Oddzial"].'">'.$row["Oddzial"].'</option>';
        }
    }

    public function WyborDzialu(){
        global $mysqli;
        $Dzquery = "SELECT * FROM dzialy ORDER BY id ASC";
        $Dzresult = $mysqli->query($Dzquery);

        foreach ($Dzresult as $row)
        {
            echo '<option value="'.$row["Dzial"].'">'.$row["Dzial"].'</option>';
        }
    }

    public function WyborStanowiska(){
        global $mysqli;
        $Stmquery = "SELECT * FROM stanowiska ORDER BY id ASC";
        $Stresult = $mysqli->query($Stmquery);

        foreach ($Stresult as $row)
        {
            echo '<option value="'.$row["stanowisko"].'">'.$row["stanowisko"].'</option>';
        }
    }



}
?>