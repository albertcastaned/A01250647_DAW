<?php
    function desplegarInfoDeXML($direccionXML)
    {

        $archivo = file_get_contents($direccionXML); 

        $libros = new SimpleXMLElement($archivo);

        $resultado = "";
        foreach ($libros->book as $libro) {
            $resultado .= "<h3>" . $libro->title . "</h3>";
            $resultado .= "<p>Autor: " . $libro->author . "</p><br>";
            $resultado .= "<p>Publicado en: " . $libro->publish_date . "</p><br>";
            $resultado .= "<p>Genero: " . $libro->genre . "</p><br>";
            $resultado .= "<p>Precio: " . $libro->price . "</p><br>";
            $resultado .= "<p>Descripcion: " . $libro->description . "</p><br>";



        }
        return $resultado;

    }
    session_start();
    include_once("_header.html");

    if(isset($_SESSION["nombre"])) {
        echo "<h2>" . $_SESSION["nombre"] . ", aqui estan los datos de los libros que cargaste:" . "</h2><br><br>";
        echo $_SESSION["contenido"];
        include_once("_logout.html");
   
    } else if(isset($_POST["nombre"])) {
        
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if (file_exists($target_file)) {
            $uploadOk = 0;
        }
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Lo siento, el archivo excede el tamaño maximo.";
            $uploadOk = 0;
        }
        if($imageFileType != "xml") {
            echo "Lo siento, solo se permiten archivos XML";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Lo siento, tu archivo no ha sido subido..";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "El archivo ". basename( $_FILES["fileToUpload"]["name"]). " se ha subido.";
            } else {
                echo "Hubo un error desconocido al subir tu archivo.";
            }
        }
        $_SESSION["nombre"] = $_POST["nombre"];
        $_SESSION["dirXML"] = $target_file;
        $_SESSION["contenido"] = desplegarInfoDeXML($_SESSION["dirXML"]);         
        echo "<h2>" . $_SESSION["nombre"] . ", aqui estan los datos de los libros que cargaste:" . "</h2><br>";
        echo $_SESSION["contenido"];
        include_once("_logout.html");
        
    } else {
        include("_login.html");
    }
    include_once("_footer.html");


?>