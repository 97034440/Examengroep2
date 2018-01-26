<?php
// Gemaakt door Thom Lisman


 session_start();
 try { // voert het uit
      $connect = connection::connect($config['database']); // connectie met de database
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      if(isset($_POST["login"]))   {        // voert de if else statement uit voor het inloggen
           if(empty($_POST["username"]) || empty($_POST["password"]))  { // als er een veld leeg is
                $message = '<label>Alle velden zijn vereist</label>';
           } else {
                $query = "SELECT * FROM accountgegevens WHERE gebruikersnaam = :username AND wachtwoord = :password"; // query word opgeroepen
                $statement = $connect->prepare($query); // word bewaakt voor sql-injectie door prepare
                $statement->execute(  // voert dan dit uit
                     array(
                          'username'     =>     $_POST["username"],
                          'password'     =>     $_POST["password"]
                     )
                );

                $count = $statement->rowCount();
                if($count > 0) {  // als de login correct is
                     $_SESSION["username"] = $_POST["username"];
                     header("location:../pages/reservation.php");

                } else { // als de login niet correct is
                     $message = '<label>Verkeerde gegevens</label>';
                }
           }

      }


 }
 catch(PDOException $error) // vangt het op als het niet werkt
 {
      $message = $error->getMessage();
 }
 ?>
