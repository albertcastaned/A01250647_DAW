<?php

    session_start();

    require_once("modelo.php");
    require_once("util.php");

    include_once("_header.html");
    if(isset($_SESSION["nombre"])) {
        
        header("location:listaCanciones.php");
   
    } else if(isset($_POST["nombre"]) && isset($_POST["link"])) {
        
        if($_POST["nombre"] != "" && $_POST["link"] != "") {
            

            $link = getSongLink($_POST["link"]);
            
            if(chechValid($link))
            {
                $_SESSION["nombre"] = $_POST["nombre"];
                $_SESSION["link"] = $link;
    
                nuevaCancion($_SESSION["nombre"], $_SESSION["link"]);
    
                header("location:listaCanciones.php");
            }else{
                $error_nombre = "El link especificado no es valido";
                include("_registrarCancion.html");
            }

        } else {
            if ($_POST["nombre"] == "") {
                $error_nombre = "El nombre no debe estar en blanco";
            } 
            if ($_POST["link"] == "") {
                $error_link = "El link no debe estar en blanco";
            }
            include("_registrarCancion.html");
        }
            
        
    } else {
        
        include("_registrarCancion.html");
    }
    
    include_once("_footer.html");

?>