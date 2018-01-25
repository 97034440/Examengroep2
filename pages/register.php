<?php
	include_once('../functions/register.php');
  	$registerfunction = new RegisterFunction();
	if(isset($_POST['submit'])) {
		$return = $registerfunction->saveregisterAction();
		extract($return);
		if(isset($anw)){
			extract($anw);
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
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
    <?php
		include('nav.php');
	?>

		<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Registreren</h1>
	               		<hr />
	               	</div>
	            </div>
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="">
						<?php
						if(isset($error))
						{
						 	foreach($error as $error)
						 	{
								 ?>
			                     <div class="alert alert-danger">
			                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error ?>
			                     </div>
			                     <?php
							}
						}
						if(isset($message))
						{
							 ?>
		                     <div class="alert alert-success">
		                        <i class="glyphicon glyphicon-ok"></i> &nbsp; <?php echo $message ?>
		                     </div>
		                    <?php
						}
						?>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Voorletters</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="voorletters" id="voorletters" placeholder="Voer je naam in" value="<?php if(isset($error)){echo ucfirst($voorletters);}?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Tussenvoegsel</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="tussenvoegsel" id="tussenvoegsel"  placeholder="Voer je tussenvoegsel in" value="<?php if(isset($error)){echo $tussenvoegsel;}?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Achternaam</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="achternaam" id="achternaam" placeholder="Voer je achternaam in" value="<?php if(isset($error)){echo ucfirst($achternaam);}?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email" placeholder="Voer je email in" value="<?php if(isset($error)){echo $email;}?>" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="gebruikersnaam" class="cols-sm-2 control-label">Gebruikersnaam</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="gebruikersnaam" id="username" placeholder="Voer je gebruikersnaam in" value="<?php if(isset($error)){echo $gebruikersnaam;}?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="wachtwoord" class="cols-sm-2 control-label">Wachtwoord</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="wachtwoord" id="password" placeholder="Voer je wachtwoord in" value="<?php if(isset($error)){echo $wachtwoord;}?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="wachtwoord" class="cols-sm-2 control-label">Wachtwoord herhalen</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="wachtwoord_controle" id="password" placeholder="Wachtwoord herhalen" value="<?php if(isset($error)){echo $wachtwoord_controle;}?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Telefoonnummer</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="telefoonnummer" id="telefoonnummer" placeholder="Voer je telefoonnummer in" value="<?php if(isset($error)){echo $telefoonnummer;}?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Adres</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-building-o fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="adres" id="adres" placeholder="Voer je adres in" value="<?php if(isset($error)){echo $adres;}?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Postcode</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-building-o fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="postcode" id="postcode" placeholder="Voer je postcode in" value="<?php if(isset($error)){echo $postcode;}?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Woonplaats</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-building-o fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="woonplaats" id="woonplaats" placeholder="Voer je woonplaats in" value="<?php if(isset($error)){echo $woonplaats;}?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Rijbewijsnummer</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-car fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="rijbewijsnummer" id="rijbewijsnummer" placeholder="Voer je rijbewijsnummer in" value="<?php if(isset($error)){echo $rijbewijsnummer;}?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Rijbewijs afgifte</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-car fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="rijbewijs_afgifte" id="rijbewijsafgifte" placeholder="Voer de datum rijbewijs afgifte in" value="<?php if(isset($error)){echo $rijbewijs_afgifte;}?>" />
								</div>
							</div>
							<p><small>Voorbeeld invoer: 19-01-2018</small></p>
						</div>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Rijbewijs geldig tot</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-car fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="rijbewijs_geldigtot" id="rijbewijsgeldigtot" placeholder="Voer de datum rijbewijs geldig tot in" value="<?php if(isset($error)){echo $rijbewijs_geldigtot;}?>" />
								</div>
							</div>
							<p><small>Voorbeeld invoer: 19-01-2023</small></p>
						</div>
						<label for="naam" class="cols-sm-2 control-label">Rijbewijs type(s)</label>
						<div class="form-group">
							<label>
								<input type="checkbox" class="checkbox" name="rijbewijs_B" value="1" <?php if(isset($_POST['rijbewijs_B'])) echo "checked='checked'"; ?>/>
								<span class="label-text">B</span>
							</label>
							<label class="checkbox2">
								<input type="checkbox" class="checkbox" name="rijbewijs_BE" value="2" <?php if(isset($_POST['rijbewijs_BE'])) echo "checked='checked'"; ?>/>
								<span class="label-text">BE</span>
							</label>
						</div>
						<div class="form-group">
							<label>
								<input type="checkbox" class="checkbox" name="rijbewijs_C" value="3" <?php if(isset($_POST['rijbewijs_C'])) echo "checked='checked'"; ?>/>
								<span class="label-text">C</span>
							</label>
							<label class="checkbox4">
								<input type="checkbox" class="checkbox" name="rijbewijs_CE" value="4" <?php if(isset($_POST['rijbewijs_CE'])) echo "checked='checked'"; ?> />
								<span class="label-text">CE</span>
							</label>
						</div>
						<div class="form-group ">
							<button type="submit" class="btn btn-primary btn-lg btn-block login-button" name="submit">Registreer</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="../js/js.js"></script>
	</body>
</html>
