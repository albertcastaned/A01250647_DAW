<?php
function connectDB() {
    $environment = "PROD";
    
    if ($environment == "DEV") {
         $bd = mysqli_connect("localhost","root","","FUROCE");
    } else if($environment == "PROD") {
         $bd = mysqli_connect("mysql1008.mochahost.com","dawbdorg_1250647","1250647","dawbdorg_A01250647");
    }
    
    mysqli_set_charset($bd,"utf8");
   
    return $bd;
}
function consultarRegistros()
{
    $db = connectDB();
    if($db == null){
        echo "Conexion base de datos no exitosa";
        return;
    }
    $query = 'CALL ConsultarRegistros()';
    $resultado = "";
    
    $registros = $db->query($query);
    while ($fila = mysqli_fetch_array($registros, MYSQLI_BOTH)) {
        $resultado .= "<tr><td>" . $fila["nombre"] . "</td><td>" . $fila["estado"] . "</td><td>" . $fila["FechaHora"] . "</td></tr>";
    }
        
    mysqli_free_result($registros);
    
    closeDB($db);
    return $resultado;
}
function consultarEstados()
{
    $db = connectDB();
    if($db == null){
        echo "Conexion base de datos no exitosa";
        return;
    }
    $query = 'CALL ConsultarEstados()';
    $resultado = array();
    
    $registros = $db->query($query);
    while ($fila = mysqli_fetch_array($registros, MYSQLI_BOTH)) {
        array_push($resultado, array($fila["idEstado"], $fila["estado"]));
    }
        
    mysqli_free_result($registros);
    
    closeDB($db);
    return $resultado;
}

function consultarCantidad()
{
    $db = connectDB();
    if($db == null){
        echo "Conexion base de datos no exitosa";
        return;
    }
    $query = 'CALL ConsultarCantidadZombies()';
    
    $registros = $db->query($query);
    while ($fila = mysqli_fetch_array($registros, MYSQLI_BOTH)) {
        $total = $fila["Numero Zombies"];
    }
        
    mysqli_free_result($registros);
    
    closeDB($db);
    return $total;
}

function consultarTablaZombiesEstado()
{
    $db = connectDB();
    if($db == null){
        echo "Conexion base de datos no exitosa";
        return;
    }
    $query = "CALL ConsultarZombies()";
    $resultado = "";
    $registros = $db->query($query);
    if(mysqli_num_rows($registros) > 0)
    {
        while ($fila = mysqli_fetch_array($registros, MYSQLI_BOTH)) {
            $resultado .= "<tr>" . "<td>" . $fila["nombre"] . "</td>" . "<td>" . obtenerEstadosPorZombie($fila["idZombie"]) . "</td>" . "</tr>";
        }
    }
    closeDB($db);

    return $resultado;

}
function obtenerEstadosPorZombie($zombieID) {
    
    $db = connectDB();
    if($db == null){
        echo "Conexion base de datos no exitosa";
        return;
    }
    $query = "CALL ConsultarEstadosDeZombies($zombieID)";
    
    $resultado = "";
    $registros = $db->query($query);
    while ($fila = mysqli_fetch_array($registros, MYSQLI_BOTH)) {
        $resultado .= $fila["estado"] . " " . $fila["FechaHora"] . "<br>";
    }

    $resultado .= ' <a class="waves-effect waves-light btn"><i class="material-icons left">add</i>Registrar estado</a>' ;
        
    mysqli_free_result($registros);
    
    closeDB($db);
    return $resultado;
    
}
function closeDB($bd) {
    
    mysqli_close($bd);
}

function obtenerZombieMasReciente()
{
    
    $db = connectDB();
    $query="CALL `ObtenerZombieMasReciente`()";
    $resultado = array();
    $registros = $db->query($query);
    if (!$registros) {
        echo "Falló CALL: (" . $query->errno . ") " . $query->error;
    }else{
        while ($fila = mysqli_fetch_array($registros, MYSQLI_BOTH)) {
            array_push($resultado, array($fila["idZombie"],$fila["nombre"]));
        }
    }
    
    closeDB($db);
    mysqli_free_result($registros);

    return $resultado;
}

function asociarZombieEstado($idZombie,$idEstado)
{
    $db = connectDB();
    $query="CALL `CrearRegistroZombieEstado`($idZombie, $idEstado)";
    
    if (!$db->query($query)) {
        echo "Falló CALL: (" . $query->errno . ") " . $query->error;
        return false;
    }   
    
    closeDB($db);
    return true;
}
function registrarZombie($nombre)
{
    $db = connectDB();
    $query="CALL `RegistrarZombie`('" . $nombre . "')";
    
    if (!$db->query($query)) {
        echo "Falló CALL: (" . $query->errno . ") " . $query->error;
        return false;
    }   
    
    closeDB($db);
    return true;
}
?>