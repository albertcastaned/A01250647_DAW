<?php
    function connectDB()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Spotify";

        $con = mysqli_connect($servername,$username,$password,$dbname);

        if(!$con)
        {
            die("Conexion fallo: " . mysqli_connect_error());
        }
        mysqli_set_charset($con,"utf8");

        return $con;
    }

    function closeDB($mysql)
    {
        mysqli_close($mysql);
    }

    function getCanciones()
    {
        $conn = connectDB();
        $sql = "SELECT id, link, solicitado_por FROM cancion";
        $result = $conn->query($sql);

        closeDB($conn);

        return $result;
    }

?>