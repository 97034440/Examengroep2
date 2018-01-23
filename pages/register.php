<?php

if(isset($_POST['submit']))
{
	$voorletters = strip_tags($_POST['voorletters']);	
	$tussenvoegsel = strip_tags($_POST['tussenvoegsel']);	
	$achternaam = strip_tags($_POST['achternaam']);	
	$email = strip_tags($_POST['email']);
	$gebruikersnaam = strip_tags($_POST['gebruikersnaam']);
	$wachtwoord = strip_tags($_POST['wachtwoord']);	
	$wachtwoord_controle = strip_tags($_POST['wachtwoord_controle']);	
	$mobiel = strip_tags($_POST['mobiel']);	
	$telefoonnummer = strip_tags($_POST['telefoonnummer']);	
	$adres = strip_tags($_POST['adres']);	
	$postcode = strip_tags($_POST['postcode']);	
	$woonplaats = strip_tags($_POST['woonplaats']);	
	$rijbewijsnummer = strip_tags($_POST['rijbewijsnummer']);	
	$rijbewijs_afgifte = strip_tags($_POST['rijbewijs_afgifte']);	
	$rijbewijs_geldigtot = strip_tags($_POST['rijbewijs_geldigtot']);	
	$rijbewijs_type = strip_tags($_POST['rijbewijs_type']);	
	
	if($voorletters == "") {
		$error[] = "Voer je naam in in!";	
	}
	else if($achternaam == "") {
		$error[] = "Voer een achternaam in!";	
	}
	else if($email == "") {
		$error[] = "Voer een email in!";	
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'Voer en geldig email adres in!';
	}
	else if($gebruikersnaam == "") {
		$error[] = "Voer een gebruikersnaam in!";	
	}
	else if($wachtwoord == "") {
		$error[] = "Voer een wachtwoord in!";
	}
	else if(strlen($wachtwoord) < 6) {
		$error[] = "Wachtwoord moet minimaal 6 tekens hebben!";	
	}
	else if($wachtwoord != $wachtwoord_controle) {
		$error[] = "Wachtwoorden komen niet overeen!";
	}
	else if($mobiel == "") {
		$error[] = "Voer een mobiel nummer in!";
	}
	else if(strlen($mobiel) < 10) {
		$error[] = "Het mobiel nummer moet minimaal 10 cijfers hebben!";	
	}
	else if(strlen($mobiel) > 10) {
		$error[] = "Het mobiel nummer mag maximaal 10 cijfers hebben!";	
	}
	else if($adres == "") {
		$error[] = "Voer een adres in!";
	}
	else if($postcode == "") {
		$error[] = "Voer een postcode in!";
	}
	else if(preg_match('/^[1-9][0-9]{4} ? [a-zA-Z]{2}$/', $postcode)) {
		$error[] = "Voer een geldige postcode in met 4 cijfers en 2 letters!";	
	}
	else if($woonplaats == "") {
		$error[] = "Voer een woonplaats in!";
	}
	else if($rijbewijsnummer == "") {
		$error[] = "Voer een rijbewijsnummer in!";
	}
	else if(strlen($rijbewijsnummer) != 10) {
		$error[] = "Het rijbewijsnummer moet 10 cijfers hebben!";	
	}
	else if($rijbewijs_afgifte == "") {
		$error[] = "Voer een rijbewijs afgifte in!";
	}
	else
	{
		// try
		// {
		// 	include_once('../modules/register.php');
  // 		 	$test = new RegisterModules();

		// 	$stmt = $this->pdo->prepare("SELECT gebruikersnaam, email FROM accountgegevens WHERE gebruikersnaam = :gebruikersnaam OR email = :email");
		// 	$stmt->execute(array(':gebruikersnaam' => $gebruikersnaam, ':email' => $email));
		// 	$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
		// 	if($row['gebruikersnaam'] == $gebruikersnaam) {
		// 		$error[] = "Deze gebruikersnaam bestaat al!";
		// 	}
		// 	else if($row['email'] == $email) {
		// 		$error[] = "Deze email bestaat al!";
		// 	}
		// 	else
		// 	{
		// 		if($gebruiker->register($gebruikersnaam,$email,$wachtwoord)){	
		// 			$gebruiker->redirect('login.php');
		// 		}
		// 	}
		// }
		// catch(PDOException $error)
		// {
		// 	echo $error->getMessage();
		// }
	}	
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    	<?php
    		include_once('../functions/register.php');
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
					<form class="form-horizontal" method="post" action="../pages/register.php">
						<?php
						if(isset($error))
						{
						 	foreach($error as $error)
						 	{
								 ?>
			                     <div class="alert alert-danger">
			                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
			                     </div>
			                     <?php
							}
						}
						else
						{
							
						}
						?>
						<div class="form-group">
							<label for="naam" class="cols-sm-2 control-label">Voorletters</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="voorletters" id="voorletters" placeholder="Voer je naam in" value="<?php if(isset($error)){echo $voorletters;}?>" />
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
									<input type="text" class="form-control" name="achternaam" id="achternaam" placeholder="Voer je achternaam in" value="<?php if(isset($error)){echo $achternaam;}?>" />
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
							<label for="naam" class="cols-sm-2 control-label">Mobiel</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="mobiel" id="mobiel" placeholder="Voer je mobiel in" value="<?php if(isset($error)){echo $mobiel;}?>" />
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
								<input type="checkbox" class="checkbox" name="rijbewijs_B" value="1" onclick='deRequire("checkbox")' required> <span class="label-text">B</span>
							</label>
							<label class="checkbox2">
								<input type="checkbox" class="checkbox" name="rijbewijs_BE" value="2" onclick='deRequire("checkbox")' required> <span class="label-text">BE</span>
							</label>
						</div>
						<div class="form-group">
							<label>
								<input type="checkbox" class="checkbox" name="rijbewijs_C" value="3" onclick='deRequire("checkbox")' required> <span class="label-text">C</span>
							</label>
							<label class="checkbox4">
								<input type="checkbox" class="checkbox" name="rijbewijs_CE" value="4" onclick='deRequire("checkbox")' required> <span class="label-text">CE</span>
							</label>
						</div>
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
		<script type="text/javascript" src="../js/js.js"></script>
	</body>
</html>
