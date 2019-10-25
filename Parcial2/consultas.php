<?php
    require_once("modelo.php");
    include_once("_header.html");

    echo "<h2>Cantidad de Zombies: " .consultarCantidad() . "</h2>";

    $datos = consultarRegistros();

    echo "<h2>Registros Ordenados: </h2>";
    include_once("registrosOrdenados.html");
    include_once("_footer.html");

?>