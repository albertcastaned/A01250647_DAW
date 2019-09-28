<?php
    require_once "util.php";
    $result = getFruits();

    echo "<table>";
    while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
    {
        echo "<tr>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["unidades"] . "</td>";
        echo "<td>" . $row["cantidad"] . "</td>";
        echo "<td>" . $row["precio"] . "</td>";
        echo "<td>" . $row["pais"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    mysqli_free_result($result);

    
?>