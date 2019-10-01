<?php
    include_once("_header.html");
    require_once "util.php";
    $result1 = getFruits();

    $titulo = "Todas las frutas";
    include("_tableHeader.html");
    while($row = mysqli_fetch_array($result1, MYSQLI_BOTH))
    {
        echo nuevoRenglonDeTabla($row);
    }
    echo "</table>";

    mysqli_free_result($result1);

    $result2 = getFruitsByName("Naranja");

    $titulo = "Frutas con nombre Naranja";

    include("_tableHeader.html");

    while($row = mysqli_fetch_array($result2, MYSQLI_BOTH))
    {
        echo nuevoRenglonDeTabla($row);
    }

    echo "</table>";

    mysqli_free_result($result2);


    $result3 = getCheapestFruits(200);

    $titulo = "Todas las con precio menor a $200";
    include("_tableHeader.html");

    while($row = mysqli_fetch_array($result3, MYSQLI_BOTH))
    {
        echo nuevoRenglonDeTabla($row);
    }
    echo "</table>";

    mysqli_free_result($result3);
    include_once("_footer.html");

?>