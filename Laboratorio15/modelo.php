<?php


function _e($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
function connectDB() {
    
    $environment = "DEV";
    
    if ($environment == "DEV") {
         $bd = mysqli_connect("localhost","root","","spotify");
    } else if($environment == "PROD") {
         $bd = mysqli_connect("localhost","root","passwdadmin","spotify");
    }

    mysqli_set_charset($bd,"utf8");
   
    return $bd;
}

function closeDB($bd) {
    
    mysqli_close($bd);
}

function canciones($id=0) {
    
    $db = connectDB();
    
    echo '<div class="row">';
    
    $query = 'SELECT id, link, pedido_por, solicitado_en, borrado_en FROM cancion WHERE borrado_en IS NULL ORDER BY solicitado_en DESC';
    
    if($id != 0) {
        $query .= " WHERE id=$id";
    }
    
    $registros = $db->query($query);
    while ($fila = mysqli_fetch_array($registros, MYSQLI_BOTH)) {
        include("_cancion.html");
    }
    
    echo "</div>";
    
    mysqli_free_result($registros);

    closeDB($db);
}

function nuevaCancion($link, $pedido_por) {
    
    $db = connectDB();
    
    $query='INSERT INTO cancion (link,pedido_por) VALUES (?,?) ';

    if (!($statement = $db->prepare($query))) {
        die("No se pudo preparar la consulta para la bd: (" . $db->errno . ") " . $db->error);
    }
    // Binding statement params 
    if (!$statement->bind_param("ss", $pedido_por, $link)) {
        die("Falló la vinculación de los parámetros: (" . $statement->errno . ") " . $statement->error); 
    }
    
    // Executing the statement
    if (!$statement->execute()) {
        die("Falló la ejecución de la consulta: (" . $statement->errno . ") " . $statement->error);
    } 

    closeDB($db);
}
function borrarCancion($timestamp, $id) {
    
    $db = connectDB();    

    $query="UPDATE cancion SET borrado_en=? WHERE id=?";
    
    if (!($statement = $db->prepare($query))) {
        die("No se pudo preparar la consulta para la bd: (" . $db->errno . ") " . $db->error);
    }
    if (!$statement->bind_param("ss", $timestamp, $id)) {
        die("Falló la vinculación de los parámetros: (" . $statement->errno . ") " . $statement->error); 
    }
    
    if (!$statement->execute()) {
        die("Falló la ejecución de la consulta: (" . $statement->errno . ") " . $statement->error);
    }

    closeDB($db);
}
function get_cancion($id) {
    $db = connectDB();
    
    $query = "SELECT id, link, pedido_por, solicitado_en FROM cancion WHERE id=$id";
    
    $registros = $db->query($query);

    while ($fila = mysqli_fetch_array($registros, MYSQLI_BOTH)) {
        $cancion["link"] = $fila["link"];
        $cancion["pedido_por"] = $fila["pedido_por"];
        $cancion["solicitado_en"] = $fila["solicitado_en"];
    }

    mysqli_free_result($registros);

    closeDB($db);
    
    return $cancion;
}


?>