<?php
    require_once("modelo.php");
    include_once("_header.html");
    $datos = consultarTablaZombiesEstado();
    include_once("index.html");
    include_once("_footer.html");

?>