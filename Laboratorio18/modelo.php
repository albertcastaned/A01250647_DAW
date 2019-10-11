<?php

function connectDB() {
    
    $environment = "DEV";
    
    if ($environment == "DEV") {
         $bd = mysqli_connect("localhost","root","","Lab18");
    } else if($environment == "PROD") {
         $bd = mysqli_connect("localhost","root","passwdadmin","Lab18");
    }
    
    // Change character set to utf8
    mysqli_set_charset($bd,"utf8");
   
    return $bd;
}

function closeDB($bd) {
    
    mysqli_close($bd);
}

function obtener_clientes($patron) {
    
    $db = connectDB();
    
    $resultado = array();
    
    $query = 'SELECT RFC, Nombre FROM Clientes';
    
    if(!empty($patron))
    {
        $query .= " WHERE Nombre LIKE '%$patron%'";
    }else{
        $query .= " LIMIT 30";
    }

    $registros = $db->query($query);
    while ($fila = mysqli_fetch_array($registros, MYSQLI_BOTH)) {
        array_push($resultado,array($fila["RFC"],$fila["Nombre"]));
    }
    
    mysqli_free_result($registros);

    closeDB($db);
    
    return $resultado;
}

function obtener_facturas($rfc)
{
    $db = connectDB();
    
    $resultado = '<div class="row"><table class="responsive-table">  <thead >
        <tr>
            <th>Folio</th>
            <th>Estado</th>
            <th>Fecha Emision</th>
            <th>Subtotal</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>';
    
    $query = "SELECT Folio, Estado, FechaEmision, Subtotal, Total FROM Facturas WHERE RFC='$rfc'";
    
    $registros = $db->query($query);
    
    if($registros->num_rows == 0)
    {
        return '<div class="row">Este cliente no tiene facturas asociadas</div>';
    }
    while ($fila = mysqli_fetch_array($registros, MYSQLI_BOTH)) {
        $resultado.= 
        '<tr>
        <td>' . $fila["Folio"] . '</td>
        <td>' . $fila["Estado"] . '</td>
        <td>' . $fila["FechaEmision"] . '</td>
        <td>' . $fila["Subtotal"] . '</td>
        <td>' . $fila["Total"] . '</td>
        </tr>';
    }
    $resultado .= "</tbody></table></div>";

    mysqli_free_result($registros);

    closeDB($db);
    
    return $resultado;
}

?>