<?php
 session_start();
 $host = "localhost";
 $username = "root";
 $password = "root";
 $database = "examen";
 $message = "";
 try
 {
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if(isset($_POST["login"]))
      {
           if(empty($_POST["gebruikersnaam"]) || empty($_POST["wachtwoord"]))
           {
                $message = '<label>Alle velden zijn vereist</label>';
           }
           else
           {
                $query = "SELECT * FROM accountgegevens WHERE gebruikersnaam = gebruikersnaam AND wachtwoord = wachtwoord";
                $statement = $connect->prepare($query);
                $statement->execute(
                     array(
                          'gebruikersnaam'     =>     $_POST["gebruikersnaam"],
                          'wachtwoord'     =>     $_POST["wachtwoord"]
                     )
                );
                $count = $statement->rowCount();
                if($count > 0)
                {
                     $_SESSION["gebruikersnaam"] = $_POST["gebruikersnaam"];
                     header("location:login_success.php");
                }
                else
                {
                     $message = '<label>Verkeerde gegevens</label>';
                }
           }
      }
 }
 catch(PDOException $error)
 {
      $message = $error->getMessage();
 }
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Inloggen</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      </head>
      <body>
           <br />
           <div class="container" style="width:500px;">
                <?php
                if(isset($message))
                {
                     echo '<label class="text-danger">'.$message.'</label>';
                }
                ?>
                <h3 align="">Inloggen</h3><br />
                <form method="post">
                     <label>Gebruikersnaam</label>
                     <input type="text" name="username" class="form-control" />
                     <br />
                     <label>Wachtwoord</label>
                     <input type="password" name="password" class="form-control" />
                     <br />
                     <input type="submit" name="login" class="btn btn-info" value="login" />
                </form>
           </div>
           <br />
      </body>
 </html>
