<?php


    require_once("modelo.php");
    session_start();

    include("_header.html");

    if(isset($_GET["id"])) {
        echo canciones($_GET["id"]);
    } else {
        echo canciones();
    }
    
    include("_footer.html");
?>