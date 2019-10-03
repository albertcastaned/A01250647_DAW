<?php
    
    require_once("modelo.php");
    session_start();

    $timestamp = date('Y-m-d G:i:s');
    borrarCancion("miguel", $_POST["id"]);

                 
    header("location:listaCanciones.php");
                 
?>