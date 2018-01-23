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
			'wachtwoord_controle' => $_POST['wachtwoord_controle'],
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
			'rijbewijs_B' => isset($_POST['rijbewijs_B']) ? '1' : '0',
			'rijbewijs_BE' => isset($_POST['rijbewijs_BE']) ? '1' : '0',
			'rijbewijs_C' => isset($_POST['rijbewijs_C']) ? '1' : '0',
			'rijbewijs_CE' => isset($_POST['rijbewijs_CE']) ? '1' : '0'
		];
		$add = $this->registerModules->addAccountgegevens($anw);
	}
}



?>
