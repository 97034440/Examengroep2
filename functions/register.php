<?php

include('../modules/register.php');

class RegisterFunction {
	
	private $registerModules;

	public function __construct() {
		$config = require'../config.php';
		$pdo = connection::connect($config['database']);
		$this->pdo = $pdo;
		$this->registerModules = new RegisterModules();
	}

	public function saveregisterAction() {
		$anw = [
			'voorletters' => $_POST['voorletters'],
			'tussenvoegsel' => $_POST['tussenvoegsel'],
			'achternaam' => $_POST['achternaam'],
			'email' => $_POST['email'],
			'gebruikersnaam' => $_POST['gebruikersnaam'],
			'wachtwoord' => $_POST['wachtwoord'],
			'wachtwoord_controle' => $_POST['wachtwoord_controle'],
			'telefoonnummer' => $_POST['telefoonnummer'],
			'adres' => $_POST['adres'],
			'postcode' => $_POST['postcode'],
			'woonplaats' => $_POST['woonplaats'],
			'rijbewijsnummer' => $_POST['rijbewijsnummer'],
			'rijbewijs_afgifte' => $_POST['rijbewijs_afgifte'],
			'rijbewijs_geldigtot' => $_POST['rijbewijs_geldigtot']
		];

		$error = $this->checkInput();
		if(!empty($error))
		{
			return [ error => $error, 'anw' => $anw];	
		}
		$add = $this->registerModules->addAccountgegevens($anw);
		if(!$add){
			return [ error => 'Opslaan is fout gegaan.'];
		} else {
			return [ message => 'Opslaan is goed gegaan.'];
		}
	}

	private function checkInput() {
		$voorletters = strip_tags($_POST['voorletters']);	
		$tussenvoegsel = strip_tags($_POST['tussenvoegsel']);	
		$achternaam = strip_tags($_POST['achternaam']);	
		$email = strip_tags($_POST['email']);
		$gebruikersnaam = strip_tags($_POST['gebruikersnaam']);
		$wachtwoord = strip_tags($_POST['wachtwoord']);	
		$wachtwoord_controle = strip_tags($_POST['wachtwoord_controle']);	
		$telefoonnummer = strip_tags($_POST['telefoonnummer']);	
		$adres = strip_tags($_POST['adres']);	
		$postcode = strip_tags($_POST['postcode']);	
		$woonplaats = strip_tags($_POST['woonplaats']);	
		$rijbewijsnummer = strip_tags($_POST['rijbewijsnummer']);	
		$rijbewijs_afgifte = strip_tags($_POST['rijbewijs_afgifte']);	
		$rijbewijs_geldigtot = strip_tags($_POST['rijbewijs_geldigtot']);	
		$rijbewijs_B = isset($_POST['rijbewijs_B']);
		$rijbewijs_BE = isset($_POST['rijbewijs_BE']);	
		$rijbewijs_C = isset($_POST['rijbewijs_C']);	
		$rijbewijs_CE = isset($_POST['rijbewijs_CE']);	
		
		$error = array();

		if($voorletters == "") {
			array_push($error, "Voer je naam in in!");	
		}
		if($achternaam == "") {
			array_push($error, "Voer een achternaam in!");
		}
		if($email == "") {
			array_push($error, "Voer een email in!");	
		}
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))	{
		    array_push($error, 'Voer een geldig email adres in!');
		}
		if($gebruikersnaam == "") {
			array_push($error, "Voer een gebruikersnaam in!");	
		}
		if($wachtwoord == "") {
			array_push($error, "Voer een wachtwoord in!");
		}
		if(strlen($wachtwoord) < 6) {
			array_push($error, "Wachtwoord moet minimaal 6 tekens hebben!");	
		}
		if($wachtwoord != $wachtwoord_controle) {
			array_push($error, "Wachtwoorden komen niet overeen!");
		}
		if($telefoonnummer == "") {
			array_push($error, "Voer een telefoonnummer in!");
		}
		if(strlen($telefoonnummer) < 10) {
			array_push($error, "Het telefoonnummer moet minimaal 10 cijfers hebben!");	
		}
		if(strlen($telefoonnummer) > 10) {
			array_push($error, "Het telefoonnummer mag maximaal 10 cijfers hebben!");	
		}
		if(!is_numeric($telefoonnummer)) {
			array_push($error, "Het telefoonnummer mag alleen cijfers bevatten!");
		}
		if($adres == "") {
			array_push($error, "Voer een adres in!");
		}
		if($postcode == "") {
			array_push($error, "Voer een postcode in!");
		}
		if(preg_match('/^[1-9][0-9]{4} ? [a-zA-Z]{2}$/', $postcode)) {
			array_push($error, "Voer een geldige postcode in met 4 cijfers en 2 letters!");	
		}
		if($woonplaats == "") {
			array_push($error, "Voer een woonplaats in!");
		}
		if($rijbewijsnummer == "") {
			array_push($error, "Voer een rijbewijsnummer in!");
		}
		if(strlen($rijbewijsnummer) != 10) {
			array_push($error, "Het rijbewijsnummer moet 10 cijfers hebben!");	
		}
		if(!is_numeric($rijbewijsnummer)) {
			array_push($error, "Het rijbewijsnummer mag alleen cijfers bevatten!");
		}
		if($rijbewijs_afgifte == "") {
			array_push($error, "Voer een rijbewijs afgifte in!");
		}
		if($rijbewijs_geldigtot == "") {
			array_push($error, "Voer een rijbewijs geldig tot in!");
		}
		// if($_POST['rijbewijs_B'] == '1') echo"selected='selected'"; 
		// elseif ($_POST['rijbewijs_BE'] == 2) echo "selected='selected'"; elseif ($_POST['rijbewijs_C'] == 3) echo "selected='selected'"; elseif ($_POST['rijbewijs_CE'] == 4) echo "selected='selected'"; 
		// {
		// 	array_push($error, "Selecteer minimaal 1 rijbewijs!");
		// }
		else {
			$stmt = $this->pdo->prepare("SELECT gebruikersnaam, email FROM accountgegevens WHERE gebruikersnaam = :gebruikersnaam OR email = :email");
			$stmt->execute(array(':gebruikersnaam' => $gebruikersnaam, ':email' => $email));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['gebruikersnaam'] == $gebruikersnaam) {
				$error[] = "Deze gebruikersnaam bestaat al!";
			}
			else if($row['email'] == $email) {
				$error[] = "Deze email bestaat al!";
			}
		}	

		return $error;
	}
}



?>
