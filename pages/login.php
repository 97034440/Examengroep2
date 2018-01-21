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
</head>
<body>
<!-- Navigatie -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
<div class="container">
 <a class="navbar-brand" href="#">Caravan en camper verhuur</a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
 </button>
 <div class="collapse navbar-collapse" id="navbarResponsive">
   <ul class="navbar-nav ml-auto">
     <li class="nav-item">
       <a class="nav-link" href="../index.php">Home</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="../pages/register.php">Registreren
       </a>
     </li>
     <li class="nav-item active"> <!-- Hier is te zien dat de op de inlogpagina zit -->
       <a class="nav-link" href="../pages/login.php">Inloggen</a>
       <span class="sr-only">(current)</span>
     </li>
   </ul>
 </div>
</div>
</nav>
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
                     <input type="submit" name="login" class="btn btn-info" value="Login" />
                </form>
           </div>
           <br />
      </body>
 </html>
