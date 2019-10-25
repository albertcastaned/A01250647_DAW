<?php
    include_once("partials/_header.html");
    require_once("modelo.php");
    if(!isset($_GET["RFC"]))
    {
        echo "No se especifo un RFC";
    }else{
        echo obtener_facturas($_GET["RFC"]);
    }
    include_once("partials/_footer.html");
?>