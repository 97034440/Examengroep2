<!DOCTYPE html>
<html lang="en">
    <head> 
    	<?php
    	include('../functions/register.php');
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
	              <a class="nav-link" href="../pages/inlog.php">Inloggen</a>
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
					<form class="form-horizontal" method="post" action="../pages/register_klantgegevens.php">
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Voorletters</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="voorletters" id="voorletters"  placeholder="Voer je naam in"/>
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
									<input type="text" class="form-control" name="achternaam" id="achternaam"  placeholder="Voer je achternaam in"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Adres</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="adres" id="adres"  placeholder="Voer je adres in"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Postcode</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="postcode" id="postcode"  placeholder="Voer je postcode in"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Woonplaats</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="woonplaats" id="woonplaats"  placeholder="Voer je woonplaats in"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Mobiel</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="mobiel" id="mobiel"  placeholder="Voer je mobiel in"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Telefoonnummer</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="telefoonnummer" id="telefoonnummer"  placeholder="Voer je telefoonnummer in"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<button type="submit" class="btn btn-primary btn-lg btn-block login-button" name="submit">Registreer</button>
						</div>
						<?php
							if(isset($_POST['submit'])) {
								$registerfunction->saveklantregisterAction();
								
							}
						?>
					</form>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.js"></script>
	</body>
</html>

