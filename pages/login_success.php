<?php
 // Gemaakt door Thom Lisman
 session_start();
 if(isset($_SESSION["username"]))
 {
      echo '<h3>U bent ingelogd<br>Welkom '.$_SESSION["username"].'!</h3>'; // geeft weer als je bent ingelogd
      echo '<br /><br /><a href="logout.php">Uitloggen</a>';
 }
 else
 {
      header("location:login.php"); // als je niet kan inloggen ga je terug naar de login.php
 }
 ?>
