<?php
session_start();
require_once 'header.php';
	use Illuminate\Database\Capsule\Manager as Capsule;

if ($loggedin){
  $idses = Capsule::table('inicio_sesion')->select(['id_inicio_sesion'])->where('user', $user)->first();
  $ins = Capsule::table('tarjeta')->select(['inicio_sesion_id_inicio_sesion'])->where('inicio_sesion_id_inicio_sesion', $idses->id_inicio_sesion)->first();
  
echo'
<center><h1>Vincula una tarjeta!</h1></center>
<form class="needs-validation" method="POST" novalidate>
<div class="form-row">
  <div class="col-md-4 mb-3">
    <label for="validationCustom01" class="text" >Numero de tarjeta: </label>
    <input name="Num" type="text" class="form-control" id="validationCustom01" maxlength="16" value="" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  
  <div class="col-md-4 mb-3">
    <label for="validationCustom02" class="text" >Nombre: </label>
    <input name="nombre" type="text" class="form-control" id="validationCustom02" value="'. $user. '" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
</div>

<div class="form-row">
  <div class="col-md-6 mb-3">
    <label for="validationCustom03" class="text" >Apellido: </label>
    <input name="ape" type="text" class="form-control" id="validationCustom03" required>
    <div class="invalid-feedback">
      Please provide a valid city.
    </div>
  </div>
</div>

<button class="btn btn-primary" type="submit">Submit form</button>
</form>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
"use strict";
window.addEventListener("load", function() {
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.getElementsByClassName("needs-validation");
  // Loop over them and prevent submission
  var validation = Array.prototype.filter.call(forms, function(form) {
    form.addEventListener("submit", function(event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add("was-validated");
    }, false);
  });
}, false);
})();
</script>';



error_reporting(E_ERROR | E_PARSE);
$num=$_POST["Num"];
$nombre=$_POST["nombre"];
$ape=$_POST["ape"];
$idname = Capsule::table('inicio_sesion')->select(['user'])->where('user', $user)->first();
  Capsule::table('tarjeta')->where('inicio_sesion_id_inicio_sesion', $idses->id_inicio_sesion)
  ->update(['id_num_tarjeta' => $num]);
  Capsule::table('tarjeta')->where('inicio_sesion_id_inicio_sesion', $idses->id_inicio_sesion)
  ->update(['id_nombre_tarjeta' => $nombre]);
  Capsule::table('tarjeta')->where('inicio_sesion_id_inicio_sesion', $idses->id_inicio_sesion)
  ->update(['id_apellido' => $ape]); 



/*queryMysql("INSERT INTO tarjeta (numtarj, Nomprop, Apeprop)
 VALUES ('$num', '$nombre', '$ape')");*/
}
else{
  echo '<h1>Debe iniciar sesion!</h1>';
}
?>