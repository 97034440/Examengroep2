<?php

include('../modules/register.php');

class RegisterFunction {
	
	private $registerModules;

	function __construct(){
		$this->registerModules = new RegisterModules();
	}

	public function saveregisterAction() {
		$anw = [
			'email' => $_POST['email'],
			'gebruikersnaam' => $_POST['gebruikersnaam'],
			'wachtwoord' => $_POST['wachtwoord'],
			'achternaam' => $_POST['achternaam'],
			'mobiel' => $_POST['mobiel'],
			'postcode' => $_POST['postcode'],
			'telefoonnummer' => $_POST['telefoonnummer'],
			'tussenvoegsel' => $_POST['tussenvoegsel'],
			'voorletters' => $_POST['voorletters'],
			'adres' => $_POST['adres'],
			'woonplaats' => $_POST['woonplaats'],
			'rijbewijsnummer' => $_POST['rijbewijsnummer'],
			'rijbewijs_afgifte' => $_POST['rijbewijs_afgifte'],
			'rijbewijs_geldigtot' => $_POST['rijbewijs_geldigtot'],
			'rijbewijs_type' => $_POST['rijbewijs_type']
		];
		$add = $this->registerModules->addAccountgegevens($anw);
	}
}



?>
