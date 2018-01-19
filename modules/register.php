<?php

<<<<<<< HEAD
include('../init.php');
include('../sql/connection.php');


=======
>>>>>>> c6b0bd3e6c56f4e60018a41e0a6f0b3eb9cfcdff
class RegisterModules
{
	protected $pdo;

<<<<<<< HEAD
	// function __construct(){
	// 	$this->init = new Init();
	// }

	public function __construct() {
	    $pdo = new PDO('mysql:host=localhost;dbname=examen', 'root', '');
=======
	//constructor heeft database connectie nodig
	 public function __construct() {
	    $pdo = new PDO('mysql:host=localhost;dbname=examen', 'root', 'root');
>>>>>>> c6b0bd3e6c56f4e60018a41e0a6f0b3eb9cfcdff
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

<<<<<<< HEAD
		$stmt = $this->init->getConnection()->prepare($q);
=======
		$stmt = $this->pdo->prepare("INSERT INTO accountgegevens (email, gebruikersnaam, status, admin, wachtwoord) VALUES (". $this->email .", ". $this->gebruikersnaam .", ". $this->status .", ". $this->admin .", ".$this->wachtwoord .")");

>>>>>>> c6b0bd3e6c56f4e60018a41e0a6f0b3eb9cfcdff
		// var_dump($this->init->getConnection()->dump_debug_info());

        $stmt->execute();

        return $stmt->fetch();
	}
}
?>