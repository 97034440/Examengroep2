<?php

class RegisterModules
{
	protected $pdo;

	//constructor heeft database connectie nodig
	 public function __construct() {
	    $pdo = new PDO('mysql:host=localhost;dbname=examen', 'root', 'root');
			$this->pdo = $pdo;
	  }
	private $voorletters;
	private $email;
	private $wachtwoord;
	private $tussenvoegsels;
	private $achternaam;
	private $gebruikersnaam;
	private $mobiel;
	private $postcode;
	private $rijbewijsnummer;
	private $telefoonnummer;
	private $status;
	private $admin;

	public function addUser($anw) {

		// $naam = $anw['naam'];
		$email = $anw['email'];
		$this->gebruikersnaam = $anw['gebruikersnaam'];
		$wachtwoord = $anw['wachtwoord'];
		$status = 1;
		$admin = 1;

		$stmt = $this->pdo->prepare("INSERT INTO accountgegevens (email, gebruikersnaam, status, admin, wachtwoord) VALUES (". $this->email .", ". $this->gebruikersnaam .", ". $this->status .", ". $this->admin .", ".$this->wachtwoord .")");

		// var_dump($this->init->getConnection()->dump_debug_info());
        $stmt->execute();

        return $stmt->fetch();
	}
}



?>
