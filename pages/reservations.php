<?php
require'../init.php';
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>De Dissel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/shop-homepage.css" rel="stylesheet">

    <!-- Custom styles for this template -->
  </head>
  <body>
    <!-- Navigation -->
    <?php
include('nav.php');
$query = new Querybuilder(connection::connect($config['database']));
$username = $_SESSION["username"];
$reservations = $query->selectImage('ordernummer', 'klant_id', $username);
$accountgegevens = $query->selectImage('ordernummer', 'klant_id', $username);
?>

    <!-- Page Content -->
        <!-- /.container -->
    <div class="container">
      <div class="row main">
        <?php foreach ($reservations as $reservation): ?>
          <div class="col-lg-10 floatleft">
            <ul>
              <li>Ordernummer: <?php echo $reservation->ordernummer;?></li>
              <li>Accountnaam: <?php echo $reservation->klant_id;?></li>
              <li>Order datum: <?php echo $reservation->orderdatum;?></li>
              <li>Datum uitgaven: <?php echo $reservation->datum_uit;?></li>
              <li>Datum teruggaven: <?php echo $reservation->datum_terug;?></li>
            </ul>
          </div>
          <?php endforeach; ?>
          <?php foreach ($accountgegevens as $accountgegeven): ?>
        <?php endforeach; ?>

       </div>
    </div>
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Ljubomir, Thom, Joanne 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
