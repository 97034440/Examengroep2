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
	private $rijbewijsnummer;
	private $rijbewijs_afgifte;
	private $rijbewijs_geldigtot;
	private $rijbewijs_type;

	public function addAccountgegevens($anw) {

		//eerste insert variablen 
		$achternaam = $anw['achternaam'];
		$mobiel = $anw['mobiel'];
		$postcode = $anw['postcode'];
		$adres = $anw['adres'];
		$woonplaats = $anw['woonplaats'];
		$telefoonnummer = $anw['telefoonnummer'];
		$tussenvoegsel = $anw['tussenvoegsel'];
		$voorletters = $anw['voorletters'];

		//tweede insert variablen 
		$email = $anw['email'];
		$gebruikersnaam = $anw['gebruikersnaam'];
		$wachtwoord = $anw['wachtwoord'];
		$wachtwoord_controle = $anw['wachtwoord_controle'];
		// $hash = password_hash($wachtwoord, PASSWORD_DEFAULT);
		$status = 1;
		$admin = 0;	

		//derde insert variablen
		$rijbewijsnummer = $anw['rijbewijsnummer'];
		$rijbewijs_afgifte = $anw['rijbewijs_afgifte'];
		$datum_afgifte = date('Y-m-d',strtotime($rijbewijs_afgifte));
		$rijbewijs_geldigtot = $anw['rijbewijs_geldigtot'];
		$datum_geldigtot = date('Y-m-d',strtotime($rijbewijs_geldigtot));
		$rijbewijs_type = $anw['rijbewijs_type'];

		$stmt = $this->pdo->prepare("INSERT INTO klantgegevens (achternaam, mobiel, adres, postcode, woonplaats, telefoonnummer, tussenvoegsel, voorletters) VALUES (:achternaam, :mobiel, :adres, :postcode, :woonplaats, :telefoonnummer, :tussenvoegsel, :voorletters)");
        $stmt->execute(array(':achternaam' => $achternaam, ':mobiel' => $mobiel, ':adres' => $adres, ':postcode' => $postcode, ':woonplaats' => $woonplaats, ':telefoonnummer' => $telefoonnummer, ':tussenvoegsel' => $tussenvoegsel, ':voorletters' => $voorletters));
        $lastid = $this->pdo->LastInsertId();

        if($wachtwoord == $wachtwoord_controle){
			$stmt2 = $this->pdo->prepare("INSERT INTO accountgegevens (email, gebruikersnaam, status, admin, wachtwoord, klantgegevens_id) VALUES (:email, :gebruikersnaam, :status, :admin, :wachtwoord, :klantgegevens_id)");
	        $stmt2->execute(array(':email' => $email, ':gebruikersnaam' => $gebruikersnaam, ':status' => $status, ':admin' => $admin, ':wachtwoord' => $wachtwoord, ':klantgegevens_id' => $lastid));
		} else {
            return false;
        }

        $stmt3 = $this->pdo->prepare("INSERT INTO rijbewijs (klantgegevens_id, rijbewijsnummer, rijbewijs_afgifte, rijbewijs_geldigtot, rijbewijs_type) VALUES (:klantgegevens_id, :rijbewijsnummer, :rijbewijs_afgifte, :rijbewijs_geldigtot, :rijbewijs_type)");
        return $stmt3->execute(array(':klantgegevens_id' => $lastid, ':rijbewijsnummer' => $rijbewijsnummer, ':rijbewijs_afgifte' => $datum_afgifte, ':rijbewijs_geldigtot' => $datum_geldigtot, ':rijbewijs_type' => $rijbewijs_type));       
	}
}
?>