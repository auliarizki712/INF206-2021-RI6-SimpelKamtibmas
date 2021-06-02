<?php
session_start();

if( isset($_SESSION["login"]) ) {
    header("Location: LihatLaporan.php");
    exit;
}

require 'function.php';
  ?>
<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN ADMIN</title>
        <link rel="stylesheet" type="text/css" href="inilogin.css">
    </head>
    <body>
        <div class="sign-up">
            
            <h3>SISTEM PELAPORAN PELANGGARAN KAMTIBMAS</h3>

            
            <form action="prosess_login.php" method="post">

                <label for = "username">Username</label>
                <input name="username" type="text" id="username" class="username-box" placeholder="Username"><i class="fa fa-username"></i>
                <span class="eye">

                    <label for = "password">Password</label>
                    <input name="password" type="password" class="password-box" placeholder="Password" id="password"><i id="hide1" class="fa fa-eye"></i>
                </span>
                <br>

                <button type="submit" name = "login" class="login-btn">Login</button>                  
            </form>
        </div>
        </script>
    </body>
    
</html>