<?php
<<<<<<< HEAD
require'../init.php';
$var = connection::connect($config['database']);

class RegisterModules
{
	private $pdo;
=======

include('../sql/connection.php');


class RegisterModules
{
	private $init;
	private $pdo;
	private $connect;
>>>>>>> 2572f0fecdfd4949ddc8eda6a8baf614777ea69d

	// function __construct(){
	// 	$this->init = new Init();
	// }
<<<<<<< HEAD
	public function __construct(PDO $pdo) {
=======

	public function __construct() {
>>>>>>> 2572f0fecdfd4949ddc8eda6a8baf614777ea69d
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

<<<<<<< HEAD
		$stmt = $this->pdo->prepare("INSERT INTO accountgegevens (email, gebruikersnaam, status, admin, wachtwoord) VALUES (". $this->email .", ". $this->gebruikersnaam .", ". $this->status .", ". $this->admin .", ".$this->wachtwoord .")");

=======
		$stmt = $this->pdo->getConnection()->prepare("INSERT INTO accountgegevens (email, gebruikersnaam, status, admin, wachtwoord) VALUES (". $this->email .", ". $this->gebruikersnaam .", ". $this->status .", ". $this->admin .", ".$this->wachtwoord .")");
>>>>>>> 2572f0fecdfd4949ddc8eda6a8baf614777ea69d
		// var_dump($this->init->getConnection()->dump_debug_info());
        $stmt->execute();

        return $stmt->fetch();
	}
}



?>
