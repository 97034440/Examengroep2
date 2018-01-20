<?php
require_once '../init.php'; //was dbconfig.php
session_start();
connection::connect($config['database']);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
            <a class="nav-link" href="../pages/register_accountgegevens.php">Registreren
            </a>
          </li>
          <li class="nav-item active"> <!-- Hier is te zien dat de op de inlogpagina zit -->
            <a class="nav-link" href="../pages/inlog.php">Inloggen</a>
            <span class="sr-only">(current)</span>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<div class="container">
     <div class="form-container">
        <form method="row main">
          <div class="panel-title text-center">
             <h1 class="title">Inloggen</h1>
           </div>
            <div class="form-group">
             <input type="text" class="form-control" name="txt_uname" placeholder="Gebruikersnaam" required />
            </div>
            <div class="form-group">
             <input type="password" class="form-control" name="txt_password" placeholder="Wachtwoord" required />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
             <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block login-button">
                Login
                </button>
            </div>
            <br />
            <label>Nog geen account? <a href="../pages/register.php">Registreer</a></label>
        </form>
       </div>
</div>
<?php
  require_once '../modules/inlog.php';
 ?>
</body>
</html>
