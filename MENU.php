<?php
session_start();
require_once 'header.php';
if ($loggedin){
echo '<form method="post"> <div class="card-deck">
 <div class="card">
   <img src="imaganes/or1.jpg" class="card-img-top" alt="...">
   <div class="card-body">
     <h5 class="card-title">Taco de pastor <br></h5>
     <p class="card-text">Ricos tacos al pastor a tan solo <br>$10 c/u </p>
     <a href="pedidos.php">Ordena uno solo aquí</a><br>
</div>
 </div>
</form>
 <br>
 <div class="card">
   <img src="imaganes/or2.jpg" class="card-img-top" alt="...">
   <div class="card-body">
     <h5 class="card-title">Horchata</h5>
     <p class="card-text">Agua de horchata con precio de $22 c/u</p>
     <a href="pedidoshorchata.php">Ordena uno solo aquí</a><br>
     
     
   </div>
 </div>
 <br>
 <div class="card">
   <img src="imaganes/or3.jpg" class="card-img-top" alt="...">
   <div class="card-body">
     <h5 class="card-title">Torta de pastor</h5>
     <p class="card-text">Rica torta de pastor a tan solo $30 c/u</p>
     <a href="pedidostorta.php">Ordena uno solo aquí</a><br>

   </div>
 </div>
</div>
<br><br><br><br><br>
<div class="card-deck">
<div class="card">
  <img src="imaganes/or4.jpg" width="300" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Agua de jamaica</h5>
    <p class="card-text">Agua de jamaica precio $20 c/u</p>
    <a href="pedidosjamaica.php">Ordena uno solo aquí</a><br>
    
  </div>
</div>
<div class="card">
  <img src="imaganes/or5.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Coca cola 600ml</h5>
    <p class="card-text">Coca-cola 600ml con precio de $16 c/u</p>
    <a href="pedidos-coca.php">Ordena uno solo aquí</a><br>
    
  </div>
</div>
<div class="card">
  <img src="imaganes/or1.jpg" width="300" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Tacos de carne asada</h5>
    <p class="card-text">Rico tacos de carne asada con un precio de 10 c/u </p>
    <a href="pedidostacosA.php">Ordena uno solo aquí</a><br>
    
  </div>
</div>
</div>
</body>
</html>';
}
else{
  echo '<h1>Debe iniciar sesion!</h1>';
}
?>

