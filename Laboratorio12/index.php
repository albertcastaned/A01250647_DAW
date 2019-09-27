<?php
    function desplegarInfoDeXML($direccionXML)
    {
        $archivo = file_get_contents($direccionXML); 

        $libros = new SimpleXMLElement($archivo);

        $resultado = "";
        $resultado .= "<h2>" . $_SESSION["nombre"] . ", aqui estan los datos de los libros que cargaste:" . "</h2><br>";
        foreach ($libros->book as $libro) {
            $resultado .=   "<div class='section'>";
            $resultado .= "<h3>" . $libro->title . "</h3>";
            $resultado .= "<p>Autor: " . $libro->author . "</p><br>";
            $resultado .= "<p>Publicado en: " . $libro->publish_date . "</p><br>";
            $resultado .= "<p>Genero: " . $libro->genre . "</p><br>";
            $resultado .= "<p>Precio: " . $libro->price . "</p><br>";
            $resultado .= "<p>Descripcion: " . $libro->description . "</p><br>";
            $resultado .= "</div>  <div class='divider'></div>";

        }
        return $resultado;
    }
    session_start();
    include_once("_header.html");

    if(isset($_SESSION["nombre"])) {
        echo $_SESSION["contenido"];
        include_once("_logout.html");
   
    } else if(isset($_POST["nombre"])) {
        
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if (file_exists($target_file)) {
            echo "El archivo ya ha sido subido anteriormente.";
        }
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "El archivo excede el tamaño maximo.";
            $uploadOk = 0;
        }
        if($imageFileType != "xml") {
            echo "Solo se permiten archivos XML";
            $uploadOk = 0;
        }
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "El archivo ". basename( $_FILES["fileToUpload"]["name"]). " se ha subido.";
            } else {
                echo "Hubo un error desconocido al subir tu archivo.";
            }
        }
        $_SESSION["nombre"] = $_POST["nombre"];
        $_SESSION["contenido"] = desplegarInfoDeXML($target_file);         

        echo $_SESSION["contenido"];
        
        include_once("_logout.html");
        
    } else {
        include("_login.html");
    }
    include_once("_footer.html");


?>