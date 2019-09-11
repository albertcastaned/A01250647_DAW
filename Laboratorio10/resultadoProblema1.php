<?php
    include_once("_header.html");
    require_once("utils.php");


    echo "<section>";
    echo validarContra($_POST["password1"],$_POST["password2"]);
    echo "</section>";

    include_once("_footer.html");
?>