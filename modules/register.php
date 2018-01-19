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
		$status = 1;
		$admin = 1;		

		$stmt = $this->pdo->prepare("INSERT INTO accountgegevens (email, gebruikersnaam, status, admin, wachtwoord) VALUES ('. $this->email .', '. $this->gebruikersnaam .', '. $this->status .', '. $this->admin .', '.$this->wachtwoord .')");
        $stmt->execute();

        return $stmt->fetch();
	}
}
?>