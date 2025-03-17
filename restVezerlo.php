<?php
require_once("Carrestkezelo.php");

$view = "";
if(isset($_GET["view"]))
    $view = $_GET["view"];


switch($view){
    case "all":
        $Oscarrest = new Carrestkezelo();
        $Oscarrest->getAllcars();
        break;

    case "single":
        $Oscarrest = new Carrestkezelo();
        $Oscarrest -> getcarById($_GET["c_id"]);
        break;

    case "tipus":
        $Oscarrest = new gamerestkezelo();
        $Oscarrest -> getcarsByType($_GET["ct_desc"]);
        break;
        
    default:
    $Oscarrest = new Carrestkezelo();
    $Oscarrest -> getFault();    
}



?>