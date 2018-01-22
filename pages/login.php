<!DOCTYPE html>
 <html>
 <head>
<?php
require_once '../init.php';
include('../functions/login.php');
session_start();
connection::connect($config['database']);


?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.css">

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="../css/style.css">

<!-- CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
<title>Login</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css"  />
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<!-- Navigatie -->
<?php
include('nav.php');
?>

      <body>
        <br />
        <br />
        <br />
           <br />
           <div class="container" style="width:500px;">
                <?php
                if(isset($message))
                {
                     echo '<label class="text-danger">'.$message.'</label>';
                }  // geeft de meldingen aan als je niet kan inloggen
                ?>
                <h3 align="">Inloggen</h3><br />
                <form method="post">
                     <label>Gebruikersnaam</label>
                     <input type="text" name="username" class="form-control" />
                     <br />
                     <label>Wachtwoord</label>
                     <input type="password" name="password" class="form-control" />
                     <br />
                     <div class="g-recaptcha" data-sitekey="6LfM6kEUAAAAAIScEuUGwfrywBPjEupp6O-uNWTZ"></div>
                     <input type="submit" name="login" class="btn btn-info" value="Login" />
                </form>
           </div>
           <br />
      </body>
 </html>
