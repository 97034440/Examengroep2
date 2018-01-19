<?php

include('../init.php');
include('../sql/connection.php');


class RegisterModules
{
	protected $pdo;

	// function __construct(){
	// 	$this->init = new Init();
	// }

	public function __construct() {
	    $pdo = new PDO('mysql:host=localhost;dbname=examen', 'root', '');
			$this->pdo = $pdo;
	  }

	private $email;
	private $gebruikersnaam;
	private $status;
	private $admin;
	private $wachtwoord;

	public function addUser($anw) {
		
		// $naam = $anw['naam'];
		$email = $anw['email'];
		$gebruikersnaam = $anw['gebruikersnaam'];
		$wachtwoord = $anw['wachtwoord'];
		$status = 1;
		$admin = 1;		
		$q = "INSERT INTO accountgegevens (email, gebruikersnaam, wachtwoord, admin, status) VALUES ('. $this->email .', '. $this->gebruikersnaam .', '. $this->wachtwoord .', '. $this->admin .', '. $this->status .')";

		$stmt = $this->init->getConnection()->prepare($q);
		// var_dump($this->init->getConnection()->dump_debug_info());

        $stmt->execute();

        return $stmt->fetch();
	}
}
?>