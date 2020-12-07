<?php
require_once 'header.php';
use Illuminate\Database\Capsule\Manager as Capsule;
if($loggedin){
echo '
<center><h1>Pedidos!</h1></center>
<form action="pedidoshorchata.php" method="post">
<div class="form-row">
  <div class="col-md-4 mb-3">
    <label for="validationCustom01" class="text" >Nombre: </label>
    <input name="nombreH" type="text" class="form-control" id="validationCustom01" value="" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  
  <div class="col-md-4 mb-3">

<div class="form-row">
  <div class="col-md-6 mb-3">
    <label for="validationCustom03" class="text" >Dirección: </label>
    <input name="DireH" type="text" class="form-control" id="validationCustom03" required>
    <div class="invalid-feedback">
      Please provide a valid city.
    </div>
  </div>
</div>
<h2 for="validationCustom03" class="text" >precio: $22 </h2>
<button class="btn btn-primary" type="submit">Submit form</button>
</form>
';
error_reporting(E_ERROR | E_PARSE);


$nombre=$_POST["nombreH"];
$direc=$_POST["DireH"];
$orden="Agua de horchata";
$precio="$22";
if($nombre  ==  "" || $direc == "")
{
  echo "Escriba su nombre y direccion.";
}
else
{

$name = Capsule::table('orden')->select(['id_nombre'])->where('id_nombre', $nombre)->first();

  if($nombre == $name->id_nombre)
  {
    echo "Este Nombre Se encuentra ye en uso.";
  }
  else
  {
    $idses = Capsule::table('inicio_sesion')->select(['id_inicio_sesion'])->where('user', $user)->first();
Capsule::table('orden')->insert(['id_pedido' => '0', 'id_nombre' => $nombre,'id_dirrecion' => ' ', 'inicio_sesion_id_inicio_sesion' => $idses->id_inicio_sesion ]);

    Capsule::table('orden')->where('id_nombre', $nombre)
    ->update(['id_pedido' => $orden]);

    Capsule::table('orden')->where('id_nombre', $nombre)
    ->update(['id_dirrecion' => $direc]);
    
    Capsule::table('orden')->where('id_nombre', $nombre)
    ->update(['precio' => $precio]);
    
  }
}









/*if($nombre  !==  "" || $direc !== "")
{
foreach($i as $idord){
  for ($idorden= 1; $idorden = $i; $idorden++) {
    echo  $idorden;
     if($idorden = $i){
      echo "exito";
     break;
     }
     else
     {
       echo "wea";
     }
}
}
}
else
{
echo " vacio";

}

/*
$ins = Capsule::table('orden')->select(['inicio_sesion_id_inicio_sesion'])->where('inicio_sesion_id_inicio_sesion', $idses->id_inicio_sesion)->first();
$idord = Capsule::table('orden')->select(['id_orden'])->where('inicio_sesion_id_inicio_sesion', $idses->id_inicio_sesion)->first();
Capsule::table('orden')->insert(['inicio_sesion_id_inicio_sesion' => $idses->id_inicio_sesion ]);
Capsule::table('orden')->where('inicio_sesion_id_inicio_sesion', $idses->id_inicio_sesion)
->update(['id_pedido' => $orden]);

Capsule::table('orden')->where('inicio_sesion_id_inicio_sesion', $idses->id_inicio_sesion)
->update(['id_nombre' => $nombre]);

Capsule::table('orden')->where('inicio_sesion_id_inicio_sesion', $idses->id_inicio_sesion)
->update(['id_dirrecion' => $direc]);

Capsule::table('orden')->where('inicio_sesion_id_inicio_sesion', $idses->id_inicio_sesion)
->update(['precio' => $precio]);


Capsule::table('orden')->insert(['id_pedido' => $orde, 'id_nombre' => $nombre, 'id_dirrecion'=>$direc, 'precio'=>$precio])->where('inicio_sesion_id_inicio_sesion', $idses->id_inicio_sesion)
*/}
/*queryMysql("INSERT INTO facped (nameped, direc, nombre, precio)
 VALUES ('$orden', '$direc', '$nombre', '$precio')");*/

?>