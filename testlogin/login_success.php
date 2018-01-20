<?php
 //login_success.php
 session_start();
 if(isset($_SESSION["gebruikersnaam"]))
 {
      echo '<h3>Login Success, Welcome - '.$_SESSION["gebruikersnaam"].'</h3>';
      echo '<br /><br /><a href="logout.php">Logout</a>';
 }
 else
 {
      header("location:login.php");
 }
 ?>
