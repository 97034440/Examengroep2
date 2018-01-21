<?php
 //login_success.php
 session_start();
 if(isset($_SESSION["username"]))
 {
      echo '<h3>U bent ingelogd<br>Welkom! '.$_SESSION["username"].'</h3>';
      echo '<br /><br /><a href="logout.php">Uitloggen</a>';
 }
 else
 {
      header("location:login.php");
 }
 ?>
