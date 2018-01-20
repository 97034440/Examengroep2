<?php
require ('../init.php');

class RegisterModules
{
	public $pdo;

	public function __construct() {
		$config = require'../config.php';
		$pdo = connection::connect($config['database']);
		$this->pdo = $pdo;
	  }

	private $email;
	private $gebruikersnaam;
	private $status;
	private $admin;
	private $wachtwoord;

	public function addUser($anw) {
		
		$email = $anw['email'];
		$gebruikersnaam = $anw['gebruikersnaam'];
		$wachtwoord = $anw['wachtwoord'];
		// $hash = password_hash($wachtwoord, PASSWORD_DEFAULT);
		$status = 1;
		$admin = 0;		


		$stmt = $this->pdo->prepare("INSERT INTO accountgegevens (email, gebruikersnaam, status, admin, wachtwoord) VALUES (:email, :gebruikersnaam, :status, :admin, :wachtwoord)");
        return $stmt->execute(array(':email' => $email, ':gebruikersnaam' => $gebruikersnaam, ':status' => $status, ':admin' => $admin, ':wachtwoord' => $wachtwoord));
	}
}
?>