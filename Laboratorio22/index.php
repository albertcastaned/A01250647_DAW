<?php
    include_once("partials/_header.html");
    require_once("GoogleCalendarAPI.php");
    include_once("partials/_tableHeader.html");
    echo obtenerEventos();
    include_once("partials/_tableFooter.html");

    include_once("partials/_footer.html");

?>