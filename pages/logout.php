<?php
 // Gemaakt door Thom Lisman
 session_start();
 session_destroy(); // destroy de sessie
 header("location:../pages/login.php"); // verplaats naar een andere pagina
 ?>
