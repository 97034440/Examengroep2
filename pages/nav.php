<?php
 //login_success.php
 if(!isset($_SESSION))
     {
         session_start();
     }
 if(isset($_SESSION["username"]))
 {
	 		echo '<nav class="navbar navbar-expand-lg navbar-light bg-info"><ul>
      <li>Welkom '.$_SESSION["username"].'!
			contactpersoon: mobiel 06-12345678  email beheer@dedissel.com</li>
			</ul></nav>'; // geeft weer als je bent ingelogd
 }
 else
 {
      header("u bent niet ingelogd"); // als je niet kan inloggen ga je terug naar de login.php
 }
 ?>
	<nav1 class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">

        <a class="navbar-brand" href="#">Caravan en camper verhuur</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <?php
            if(isset($_SESSION["username"]))
            {
              echo '<li class="nav-item">
                <a class="nav-link" href="http://localhost/Examengroep2/">Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/Examengroep2/pages/reservation.php">Reservation</a>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="http://localhost/Examengroep2/pages/reservations.php"">Reservations</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/Examengroep2/pages/mijnaccount.php"">Mijn account</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="http://localhost/Examengroep2/pages/logout.php"">Logout</a>
              </li>';
            }
            else
            {
              echo '<li class="nav-item">
                <a class="nav-link" href="http://localhost/Examengroep2/">Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/Examengroep2/pages/register.php">Registreren</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/Examengroep2/pages/login.php">Inloggen</a>
              </li>';
            }
             ?>

          </ul>
        </div>
      </div>
    </nav1>
