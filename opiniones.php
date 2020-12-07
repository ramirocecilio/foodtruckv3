<?php
session_start();
require_once 'header.php';
use Illuminate\Database\Capsule\Manager as Capsule;

if ($loggedin){
  $idses = Capsule::table('inicio_sesion')->select(['id_inicio_sesion'])->where('user', $user)->first();
  $ins = Capsule::table('opinion')->select(['inicio_sesion_id_inicio_sesion'])->where('inicio_sesion_id_inicio_sesion', $idses->id_inicio_sesion)->first();


  
echo ' <h5 class="text"> Valor de respuesta: 1.- muy mal 2.- mal 3.- normal 4.- bien 5.- Excelente </h5>
<form method="POST">
  <div class="form-group">
    <label for="exampleFormControlInput1" class="text">Deje un correo electronico si desea recibir las nuevas ofertas! (opcional)</label>
    <input name="correo" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1" class="text">¿Que le parecio la calidad de la pagina?</label>
    <select name="preg1" class="form-control" id="exampleFormControlSelect1">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
  </div>
  <div class="form-group">
  <label for="exampleFormControlSelect1" class="text">¿Que le parecion los precios?</label>
  <select class="form-control" id="exampleFormControlSelect1" name="preg2">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select>
</div>
<div class="form-group">
<label for="exampleFormControlSelect1" class="text">¿Que le parecio el servicio?</label>
<select name="preg3" class="form-control" id="exampleFormControlSelect1">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
</select>
</div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1" class="text">Deja tu opinion, sugerencia o algun comentari, tienes 345 caracteres disponibles! (recuerda que este no debe ser ofensivo)</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="comentario" rows="3" maxlength="345"></textarea>
  </div>
  <button type="submit" class="btn btn-primary mb-2">Enviar respuestas!</button>
</form>';

error_reporting(E_ERROR | E_PARSE);
$correo=$_POST["correo"];
$pregUno=$_POST["preg1"];
$pregDos=$_POST["preg2"];
$pregTres=$_POST["preg3"];
$txtA=$_POST["comentario"];
$idses = Capsule::table('inicio_sesion')->select(['id_inicio_sesion'])->where('user', $user)->first();
$ins = Capsule::table('tarjeta')->select(['inicio_sesion_id_inicio_sesion'])->where('inicio_sesion_id_inicio_sesion', $idses->id_inicio_sesion)->first();

Capsule::table('opinion')->where('inicio_sesion_id_inicio_sesion', $idses->id_inicio_sesion)
->update(['id_correo' => $correo]);
Capsule::table('opinion')->where('inicio_sesion_id_inicio_sesion', $idses->id_inicio_sesion)
->update(['id_estrella1' => $pregUno]);
Capsule::table('opinion')->where('inicio_sesion_id_inicio_sesion', $idses->id_inicio_sesion)
->update(['id_estrella2' => $pregDos]);
Capsule::table('opinion')->where('inicio_sesion_id_inicio_sesion', $idses->id_inicio_sesion)
->update(['id_estrella3' => $pregTres]);
Capsule::table('opinion')->where('inicio_sesion_id_inicio_sesion', $idses->id_inicio_sesion)
->update(['id_texto' => $txtA]);
/*queryMysql("INSERT INTO opiniones (correo, preguno, pregdos, pregtres, txt)
 VALUES ('$correo', '$pregUno', '$pregDos', '$pregTres', '$txtA')");  */
 
}
 else{
   echo '<h1>Debe iniciar sesion!</h1>';
 }
?>