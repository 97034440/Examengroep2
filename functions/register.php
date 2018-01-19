<?php

include('../modules/register.php');

class RegisterFunction {

	private $registerModules;

	function __construct(){
		$this->registerModules = new RegisterModules();
	}

	public function saveregisterAction() {
		$anw = [
			// 'naam' => $_POST['naam'],
			'email' => $_POST['email'],
			'gebruikersnaam' => $_POST['gebruikersnaam'],
			'wachtwoord' => $_POST['wachtwoord']
		];
		$add = $this->registerModules->addUser($anw);






		//$voorletters = $_POST['voorletters'];
		// $tussenvoegsels = $_POST['tussenvoegsels'];
		// $achternaam = $_POST['achternaam'];
		// $gebruikersnaam = $_POST['gebruikersnaam'];
		// $mobiel = $_POST['mobiel'];
		// $postcode = $_POST['postcode'];
		// $rijbewijsnummer = $_POST['rijbewijsnummer'];
		// $telefoonnummer = $_POST['telefoonnummer'];
	}
}



?>
