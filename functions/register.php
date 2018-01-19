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
		
	}
}



?>
