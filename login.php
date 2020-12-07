<?php
  require_once 'header.php';
  use Illuminate\Database\Capsule\Manager as Capsule;

  $error = $user = $pass = "";

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);

    if ($user == "" || $pass == "")
      $error = 'Not all fields were entered';
    else
    {
      $result = Capsule::table('inicio_sesion')->select(['user', 'pass'])->where('user', $user)->where('pass', $pass)->first();

      /*$result = queryMySQL("SELECT user,pass FROM members 
        WHERE user='$user' AND pass='$pass'");*/

      if (!$result)
      {
        $error= "Invalide login attempt";
      }
      else
      {
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        $idses = Capsule::table('inicio_sesion')->select(['id_inicio_sesion'])->where('user', $user)->first();
        Capsule::table('tarjeta')->insert(['inicio_sesion_id_inicio_sesion' =>$idses->id_inicio_sesion]);
        Capsule::table('opinion')->insert(['inicio_sesion_id_inicio_sesion' => $idses->id_inicio_sesion ]);
        die("<br><center><div class='text'>You are now logged in. Please
        <a data-transition='slide' href='index.php?view=$user'>click here</a> 
        to continue.</div></center></body></html>"); 
      }
    }    
  }

echo <<<_END
      <form method='post' action='login.php'>
        <div data-role='fieldcotain'>
          <label></label>
          <span class='error'>$error</span>
        </div>
        <div data-role='fieldcontain'>
            <label></label>
            Please enter your details to log in
        </div>  
        <div data-role='fieldcotain'>
            <label>Username</label>
            <input type='text' maxlength='16' name='user' value='$user'>
        </div>
        <div data-role='fieldcontain'>
            <label>Password</label>
            <input type='password' maxlength='16' name='pass' value='$pass'>
        </div>
        <div data-role='fieldcontain'>
            <label></label>
            <input data-transition='slide' type='submit' value='login'>
        </div>
      </form>
    </div>
  </body>
</html>
_END;
?>