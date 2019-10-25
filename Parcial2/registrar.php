<?php
    require_once("modelo.php");
    include_once("_header.html");
    if(isset($_POST["nombre"]))
    {
        if(registrarZombie($_POST["nombre"]))
        {
            $zombie = obtenerZombieMasReciente();
            if(asociarZombieEstado($zombie[0][0],$_POST["estado"]))
            {
                echo "<h2>Se registro exitosamente el nuevo zombie</h2>";

            }else{
                echo "<h2>Ocurrio un error al registrar el nuevo zombie</h2>";
            }
        }
        else
            echo "<h2>Ocurrio un error al registrar el nuevo zombie</h2>";
        
    }else{
        $estados = consultarEstados();
        include_once("registrar.html");
    }

    include_once("_footer.html");

?>