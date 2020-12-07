<?php
    require_once 'functions.php';
    use Illuminate\Database\Capsule\Manager as Capsule;

    if (isset($_POST['user']))
    {
        $user  =  sanitizeString($_POST['user']);
        $result = Capsule::table('inicio_sesion')->select(['user'])->where('user', $user)->first();
        //$result = queryMysql("SELECT * FROM members WHERE user= '$user'");

        if ($result)
            echo "<span class= 'taken'>&nbsp;&#x2718; " .
            "The username '$user' is taken</span>";
        else
            echo "<span class='available'>&nbsp;&#x2714; " .
            "The username '$user' is available</span>";
    
    }
?>