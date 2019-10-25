<?php
require_once("modelo.php");

$pattern=strtolower($_GET['pattern']);
$words=obtener_clientes($pattern);

$response="";
$size=0;
for($i=0; $i<count($words); $i++)
{
   $pos=stripos(strtolower($words[$i][1]),$pattern);
   if(empty($pos) || !($pos===false))
   {
     $size++;
     $RFC=$words[$i][0];
     $Nombre=$words[$i][1];

     $response.="<tr><td>$RFC</td><td>$Nombre</td><td><a href='facturas.php?RFC=$RFC'>Ver</a></td></tr>";
   }
}
if($size>0)
{
  echo 
  "<table class='responsive-table'>                
  <thead >
    <tr>
        <th>RFC</th>
        <th>Nombre</th>
        <th>Ver Facturas</th>
    </tr>
  </thead>
  <tbody>
    $response
  </tbody>

  </table>";
}else{
  echo "No se encontro ningun resultado";
}
?>
