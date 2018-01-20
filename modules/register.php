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
	private $mobiel;
	private $achternaam;
	private $postcode;
	private $telefoonnummer;
	private $tussenvoegsel;
	private $voorletters;
	private $adres;
	private $woonplaats;
	private $klantgegevens_id;

	public function addAccountgegevens($anw) {
		
		$email = $anw['email'];
		$gebruikersnaam = $anw['gebruikersnaam'];
		$wachtwoord = $anw['wachtwoord'];
		// $hash = password_hash($wachtwoord, PASSWORD_DEFAULT);
		$status = 1;
		$admin = 0;		

		$achternaam = $anw['achternaam'];
		$mobiel = $anw['mobiel'];
		$postcode = $anw['postcode'];
		$adres = $anw['adres'];
		$woonplaats = $anw['woonplaats'];
		$telefoonnummer = $anw['telefoonnummer'];
		$tussenvoegsel = $anw['tussenvoegsel'];
		$voorletters = $anw['voorletters'];


		$stmt = $this->pdo->prepare("INSERT INTO klantgegevens (achternaam, mobiel, adres, postcode, woonplaats, telefoonnummer, tussenvoegsel, voorletters) VALUES (:achternaam, :mobiel, :adres, :postcode, :woonplaats, :telefoonnummer, :tussenvoegsel, :voorletters)");
        $stmt->execute(array(':achternaam' => $achternaam, ':mobiel' => $mobiel, ':adres' => $adres, ':postcode' => $postcode, ':woonplaats' => $woonplaats, ':telefoonnummer' => $telefoonnummer, ':tussenvoegsel' => $tussenvoegsel, ':voorletters' => $voorletters));
        $lastid = $this->pdo->LastInsertId();

		$stmt2 = $this->pdo->prepare("INSERT INTO accountgegevens (email, gebruikersnaam, status, admin, wachtwoord, klantgegevens_id) VALUES (:email, :gebruikersnaam, :status, :admin, :wachtwoord, :klantgegevens_id)");
        return $stmt2->execute(array(':email' => $email, ':gebruikersnaam' => $gebruikersnaam, ':status' => $status, ':admin' => $admin, ':wachtwoord' => $wachtwoord, ':klantgegevens_id' => $lastid));       
	}

	// public function addKlantgegevens($anw) {
		
	// 	$achternaam = $anw['achternaam'];
	// 	$mobiel = $anw['mobiel'];
	// 	$postcode = $anw['postcode'];
	// 	$adres = $anw['adres'];
	// 	$woonplaats = $anw['woonplaats'];
	// 	$telefoonnummer = $anw['telefoonnummer'];
	// 	$tussenvoegsel = $anw['tussenvoegsel'];
	// 	$voorletters = $anw['voorletters'];

	// 	$stmt = $this->pdo->prepare("SELECT gebruikersnaam FROM accountgegevens WHERE ");

 //        $stmt2 = $this->pdo->prepare("INSERT INTO klantgegevens (achternaam, gebruikersnaam, mobiel, adres, postcode, woonplaats, telefoonnummer, tussenvoegsel, voorletters) VALUES (:achternaam, :gebruikersnaam, :mobiel, :adres, :postcode, :woonplaats, :telefoonnummer, :tussenvoegsel, :voorletters)");
 //        return $stmt2->execute(array(':achternaam' => $achternaam, ':gebruikersnaam' => $gebruikersnaam, ':mobiel' => $mobiel, ':adres' => $adres, ':postcode' => $postcode, ':woonplaats' => $woonplaats, ':telefoonnummer' => $telefoonnummer, ':tussenvoegsel' => $tussenvoegsel, ':voorletters' => $voorletters,));
	// }
}
?>