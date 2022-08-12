<?php
include('connect.php');
require_once 'livespace.php';



class WidokKontaktow
{

    private $task = "";

    function __construct()
    {

        $this->task = empty($_GET['task']) ? 'show' : $_GET['task'];

        switch ($this->task) {
            case "getData":
                echo $this->getContactsData();
                exit;
            default:
                $this->show();
                break;
        }
    }

    private function showContacts()
    {
        $html = "";
        $html .= "<div class='row justify-content-center mb-5'> 
                    <h1>Tabela Kontakty</h1>
                </div>";
        $html .= $this->createFilters();
        $html .= '<div class="row justify-content-center">
                    <div class="col-auto">';
        $html .= "<table id=\"tabela_Kontakty\" class=\"table table-sm2 table-bordered table-hover \" style=\"width:100%\">        
                        <thead class=\"bg-primary text-white\">
                        </thead>
                        <tbody>
                        </tbody>             
                    </table>";
        $html .= "    </div>
                  </div>";
        $html .= "<script src='/js2/Kontaktyjs.js'></script>";

        v4function::displayBoxMainContent($html, "Tabela Kontakty");
    }

    private function getContactsData()
    {

        $query = "SELECT id, Imie, Nazwisko, Firma, Oddzial, Dzial, Stanowisko, numerStacjonarny, numerKomorkowy,adresEmail,NULL,NULL
                 FROM glowna ORDER BY id DESC";
        $data = query2array($query);
        $data = array("data" => $data);
        header("Content-type: application/json");
        return json_encode($data);
    }

}



function query2array($query = "", $fetchMode = MDB2_FETCHMODE_ASSOC, $db = null) {
    global $mysqli;
    if (empty($db)) {
        $db = $mysqli;
    }
    try {
        $res = $db->query($query);
        if (PEAR::isError($res)) {
            messagehtml(errQueryMDB2($res->getuserinfo() . "<br />" . $query), "error");
        }
    } catch (Exception $e) {
        messagehtml($e->getMessage() . "<br />" . $query, "error");
    }
    $aLista = $res->fetchAll($fetchMode);

    return $aLista;
}


include('connect.php');
global $mysqli;
global $glowna;
$result = mysqli_query($mysqli, $glowna);
$json_array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $json_array[] = $row;
}

//echo '<pre>';
//print_r($json_array);
//echo '<pre>';
//echo 'json_encode($json_array)';


?>