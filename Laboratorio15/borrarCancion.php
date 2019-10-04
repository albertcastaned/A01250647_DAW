<?php
    
    require_once("modelo.php");
    session_start();

    $timestamp = date('Y-m-d G:i:s');
    borrarCancion($timestamp,$_GET["id"]);

                 
    header("location:listaCanciones.php");
                 
?>