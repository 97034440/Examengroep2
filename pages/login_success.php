<?php
 //login_success.php
 session_start();
 if(isset($_SESSION["username"]))
 {
      echo '<h3>U bent ingelogd<br>Welkom '.$_SESSION["username"].'!</h3>'; // geeft weer als je bent ingelogd
      echo '<br /><br /><a href="logout.php">Uitloggen</a>';
 }
 else
 {
      header("location:login.php"); // asl je niet kan inloggen ga je terug naar de login.php
 }
 ?>

 <?php
  //  session_start();
  //    if($_SESSION['logged']==true){
  //        echo $_SESSION["username"];
  //        echo '<a href="logout.php"><span>Logout</span></a></li>';
  //        }
  //    elseif($_SESSION['logged']==false)
  //        echo '<a href="registerform.html"><span>Login/Register</span></a></li>';
  //    ?>
