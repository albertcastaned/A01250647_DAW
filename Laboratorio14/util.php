<?php
    function connectDB()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Fruta";

        $con = mysqli_connect($servername,$username,$password,$dbname);

        if(!$con)
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        mysqli_set_charset($con,"utf8");

        return $con;
    }

    function closeDB($mysql)
    {
        mysqli_close($mysql);
    }

    function getFruits()
    {
        $conn = connectDB();
        $sql = "SELECT nombre, unidades, cantidad, precio, pais FROM fruta";
        $result = $conn->query($sql);

        closeDB($conn);

        return $result;
    }

    function getFruitsByName($fruit_name)
    {
        $conn = connectDB();

        $sql = "SELECT nombre, unidades, cantidad, precio, pais FROM fruta WHERE nombre LIKE '%$fruit_name%'";

        $result = $conn->query($sql);

        closeDB($conn);
        
        return $result;
    }
    function getCheapestFruits($cheap_price)
    {
        $conn = connectDB();

        $sql = "SELECT nombre, unidades, cantidad, precio, pais FROM fruta WHERE precio < $cheap_price";

        $result = $conn->query($sql);

        closeDB($conn);
        
        return $result;
    }

    function nuevoRenglonDeTabla($row)
    {
        $resultado = "";
        $resultado .= "<tr>";
        $resultado .= "<td>" . $row["nombre"] . "</td>";
        $resultado .=  "<td>" . $row["unidades"] . "</td>";
        $resultado .=  "<td>" . $row["cantidad"] . "</td>";
        $resultado .=  "<td>" . $row["precio"] . "</td>";
        $resultado .=  "<td>" . $row["pais"] . "</td>";
        $resultado .=  "</tr>";
        return $resultado;
    }
?>