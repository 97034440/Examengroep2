<?php
require'../init.php';
$var = connection::connect($config['database']);

class RegisterModules
{
<<<<<<< HEAD
	private $init;
=======
	private $pdo;
>>>>>>> 18d10556ed46a421d2997e57826fb981540858c2

	// function __construct(){
	// 	$this->init = new Init();
	// }
<<<<<<< HEAD

	public function __construct() {
    	
    	$this->pdo = new $connection();
    }
=======
	public function __construct(PDO $pdo) {
    	$this->pdo = $pdo;
  }
>>>>>>> 18d10556ed46a421d2997e57826fb981540858c2

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

<<<<<<< HEAD
		$stmt = $this->pdo->prepare("INSERT INTO accountgegevens (email, gebruikersnaam, status, admin, wachtwoord) VALUES (". $this->email .", ". $this->gebruikersnaam .", ". $this->status .", ". $this->admin .", ".$this->wachtwoord .")");
=======
>>>>>>> 18d10556ed46a421d2997e57826fb981540858c2
		// var_dump($this->init->getConnection()->dump_debug_info());
        $stmt->execute();

        return $stmt->fetch();
	}
}



?>
