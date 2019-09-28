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

        $sql = "SELECT Nombre, Unidades, Cantidad, Precio, Pais FROM Fruta WHERE name LIKE  '%" . $fruit_name . "%'";

        $result = mysqli_query($conn, $sql);

        closeDB($conn);
        
        return $result;
    }
    function getCheapestFruits($cheap_price)
    {
        $conn = connectDB();

        $sql = "SELECT Nombre, Unidades, Cantidad, Precio, Pais FROM Fruta WHERE price <=  '" . $cheap_price . "'";

        $result = mysqli_query($conn, $sql);

        closeDB($conn);
        
        return $result;
    }
?>