<!DOCTYPE html>
<html>
   <head>
	<title>Instalando database</title>
   </head>
   <body>
	<h3>Instalando...</h3>


<?php
    require_once 'functions.php';
    
    createTable('FacPed',
		         'nameped VARCHAR(15),
		          direc VARCHAR(16),
				  nombre VARCHAR(16),
				  precio VARCHAR(4)');
	createTable('Opiniones',
		 		 'correo VARCHAR(20),
		 		  preguno VARCHAR(5),
		 		  pregdos VARCHAR(5),
		 		  pregtres VARCHAR(5),
		 		  txt VARCHAR(345)');
    createTable('TARJETA',
				 'numtarj VARCHAR (16),
		 		  Nomprop VARCHAR (10),
		 		  Apeprop VARCHAR (10)');
?>
<br>...Listo!!.
</body>
</html>