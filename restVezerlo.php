<?php
require_once("OscarrestKezelo.php");

$view = "";
if(isset($_GET["view"]))
    $view = $_GET["view"];


switch($view){
    case "all":
        $Oscarrest = new Oscarrestkezelo();
        $Oscarrest->getAllOscars();
        break;

    case "single":
        $Oscarrest = new Oscarrestkezelo();
        $Oscarrest -> getOscarById($_GET["id"]);
        break;

    case "tipus":
        $Oscarrest = new Oscarrestkezelo();
        $Oscarrest -> getOscarByType($_GET["tid"]);
        break;
        
    default:
    $Oscarrest = new Oscarrestkezelo();
    $Oscarrest -> getFault();    
}



?>