<?php
   session_start();
echo <<<_INIT
 
<!DOCTYPE html>
<html>
   <head>
      <meta charset= 'utf-8'>
      <meta name='viewport' content='width=device-width,
      initial-sacle=1'>


      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel= 'stylesheet' href='jquery.mobile-1.4.5.min.css'>
      <link rel='stylesheet' href='styles.css' type='text/css'>

      <script src="js/jquery-3.4.1.js" ></script>
      <script src="js/popper.js" ></script>
      <script src="js/bootstrap.min.js"></script>
      
      <script src='javascript.js'></script>
      <script src='jquery-2.2.4.min.js'></script>
      <script src='jquery.mobile-1.4.5.min.js'></script>
_INIT;
   require_once 'functions.php';
   $userstr = 'Bienvenido ';
   if (isset($_SESSION['user'])) {
      $user     = $_SESSION['user'];
      $loggedin =  TRUE;
      $userstr  = "Sesion de : $user";
   }
   else $loggedin = FALSE;

echo <<<_MAIN
      <title>Food Truck TacoTruck</title>
   </head>
   <body>
      <div data-role='page' >
         <div id ='fondo'>
            <div id= 'logo'class='center'>Food Truck TacoTruck</div>
            <center><img id='robin' src='imaganes/TACO.png' width="300"></center><br><br>
            <div class='username'>$userstr</div> 
         </div>
         <div data-role='content' id="fondo2">
_MAIN;
 
echo <<<_LOGGEDIN
        <center> <div>
            <a data-role='button' data-inline='true' data-icon='home'
               data-transition="slide" href='MENU.php'>Menu</a> 
               <a data-role='button' data-inline='true' data-icon='home'
               data-transition="slide" href='login.php'>Login</a> 
               <a data-role='button' data-inline='true' data-icon='home'
               data-transition="slide" href='signup.php'>Signup</a> 
            <a data-role='button' data-inline='true' data-icon='home'
               data-transition_"slide" href='index.php'>Home</a>
            <a data-role='button' data-inline='true' data-icon='mail'
               data-transition="slide" href='opiniones.php'>Deja tu opinion</a>
               <a data-role='button' data-inline='true' data-icon='action'
               data-transition="slide" href='tarjeta.php'>Vincula una tarjeta!</a> 
            <a data-role='button' data-inline='true' data-icon='action'
               data-transition="slide" href='logout.php'>Log out</a> 
         </div> </center>   
_LOGGEDIN;
?>