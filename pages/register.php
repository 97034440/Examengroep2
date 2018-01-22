<!DOCTYPE html>
<html lang="en">
    <head>
    	<?php
    	include('../functions/register.php');
  		//include('../init.php');
  		$registerfunction = new RegisterFunction();
  		?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.css">

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="../css/style.css">

		<!-- CSS -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

		<title>Registreren</title>
	</head>
	<body>
			<!-- Navigation -->
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
	            <li class="nav-item active">
	              <a class="nav-link" href="../pages/register.php">Registreren
	              	<span class="sr-only">(current)</span>
	              </a>
	            </li>
	            <li class="nav-item">
	              <a class="nav-link" href="../pages/login.php">Inloggen</a>
	            </li>
	          </ul>
	        </div>
	      </div>
	    </nav>
		<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Registreren</h1>
	               		<hr />
	               	</div>
	            </div>
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="../pages/register.php">


						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Voorletters</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="voorletters" id="voorletters" required="required" placeholder="Voer je naam in"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Tussenvoegsel</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="tussenvoegsel" id="tussenvoegsel"  placeholder="Voer je tussenvoegsel in"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Achternaam</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="achternaam" id="achternaam" required="required" placeholder="Voer je achternaam in"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email" required="required" placeholder="Voer je email in"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="gebruikersnaam" class="cols-sm-2 control-label">Gebruikersnaam</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="gebruikersnaam" id="username" required="required" placeholder="Voer je gebruikersnaam in"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="wachtwoord" class="cols-sm-2 control-label">Wachtwoord</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="wachtwoord" id="password" required="required" placeholder="Enter your Password"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Mobiel</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="mobiel" id="mobiel" required="required" placeholder="Voer je mobiel in"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Telefoonnummer</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="telefoonnummer" id="telefoonnummer" placeholder="Voer je telefoonnummer in"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Adres</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-building-o fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="adres" id="adres" required="required" placeholder="Voer je adres in"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Postcode</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-building-o fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="postcode" id="postcode" required="required" placeholder="Voer je postcode in"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Woonplaats</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-building-o fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="woonplaats" id="woonplaats" required="required" placeholder="Voer je woonplaats in"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Rijbewijsnummer</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-building-o fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="rijbewijsnummer" id="rijbewijsnummer" required="required" placeholder="Voer je rijbewijsnummer in"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Rijbewijs afgifte</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-building-o fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="rijbewijs_afgifte" required="required" id="rijbewijsafgifte" placeholder="Voer de datum rijbewijs afgifte in"/>
								</div>
							</div>
							<p><small>Voorbeeld invoer: 19-01-2018</small></p>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Rijbewijs geldig tot</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-building-o fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="rijbewijs_geldigtot" id="rijbewijsgeldigtot" required="required" placeholder="Voer de datum rijbewijs geldig tot in"/>
								</div>
							</div>
							<p><small>Voorbeeld invoer: 19-01-2023</small></p>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Rijbewijs type</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-building-o fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="rijbewijs_type" id="rijbewijstype" required="required" placeholder="Voer je rijbewijs type(s) in"/>
								</div>
							</div>
							<p><small>Voorbeeld invoer: AM, B, C</small></p>
						</div>
<!--
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Herhaal wachtwoord</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="wachtwoord" id="confirm"  placeholder="Confirm your Password"/>
								</div>
							</div> -->
						<!-- </div> -->

						<div class="form-group ">
							<button type="submit" class="btn btn-primary btn-lg btn-block login-button" name="submit">Registreer</button>
						</div>
						<?php
							if(isset($_POST['submit'])) {
								$registerfunction->saveregisterAction();

							}
						?>
					</form>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.js"></script>
	</body>
</html>
