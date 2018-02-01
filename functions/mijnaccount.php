<!-- Dit document is gemaakt door Joanne -->
<?php
session_start();
$user = $_SESSION['username'];
error_reporting(0);
include('../modules/mijnaccount.php');

Class AccountFunction {

	private $accountModules;

	public function __construct() {
		$config = require'../config.php';
		$pdo = connection::connect($config['database']);
		$this->pdo = $pdo;
		$this->AccountModules = new AccountModules();
	}

	public function getAccountAction() {
		$accountgegevens = $this->AccountModules->accountGegevens();
		return $accountgegevens;
	}

	public function updateAccountAction() {
		$anw = [
			'voorletters' => $_POST['voorletters'],
			'tussenvoegsel' => $_POST['tussenvoegsel'],
			'achternaam' => $_POST['achternaam'],
			'email' => $_POST['email'],
			'telefoonnummer' => $_POST['telefoonnummer'],
			'adres' => $_POST['adres'],
			'postcode' => $_POST['postcode'],
			'woonplaats' => $_POST['woonplaats'],
			'rijbewijsnummer' => $_POST['rijbewijsnummer'],
			'rijbewijs_afgifte' => $_POST['rijbewijs_afgifte'],
			'rijbewijs_geldigtot' => $_POST['rijbewijs_geldigtot']
		];

		$error = $this->checkAccount();
		if(!empty($error))
		{
			return [ error => $error, 'anw' => $anw];	
		}
		$update = $this->AccountModules->accountUpdate($anw);
		if(!$update){
			return [ error => 'Opslaan is fout gegaan.'];
		} else {
			return [ message => 'Opslaan is goed gegaan.'];
		}
		
		return $update;
	}

	private function checkAccount() {
		$voorletters = strip_tags($_POST['voorletters']);	
		$tussenvoegsel = strip_tags($_POST['tussenvoegsel']);	
		$achternaam = strip_tags($_POST['achternaam']);	
		$email = strip_tags($_POST['email']);
		$telefoonnummer = strip_tags($_POST['telefoonnummer']);	
		$adres = strip_tags($_POST['adres']);	
		$postcode = strip_tags($_POST['postcode']);	
		$woonplaats = strip_tags($_POST['woonplaats']);	
		$rijbewijsnummer = strip_tags($_POST['rijbewijsnummer']);	
		$rijbewijs_afgifte = strip_tags($_POST['rijbewijs_afgifte']);	
		$rijbewijs_geldigtot = strip_tags($_POST['rijbewijs_geldigtot']);		
		
		$error = array();

		if($voorletters == "") {
			array_push($error, "Voer je naam in in!");	
		}
		if($achternaam == "") {
			array_push($error, "Voer een achternaam in!");
		}
		if($email == "") {
			array_push($error, "Voer een email in!");	
		}
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))	{
		    array_push($error, 'Voer een geldig email adres in!');
		}
		if($telefoonnummer == "") {
			array_push($error, "Voer een telefoonnummer in!");
		}
		if(strlen($telefoonnummer) < 10) {
			array_push($error, "Het telefoonnummer moet minimaal 10 cijfers hebben!");	
		}
		if(strlen($telefoonnummer) > 10) {
			array_push($error, "Het telefoonnummer mag maximaal 10 cijfers hebben!");	
		}
		if(!is_numeric($telefoonnummer)) {
			array_push($error, "Het telefoonnummer mag alleen cijfers bevatten!");
		}
		if($adres == "") {
			array_push($error, "Voer een adres in!");
		}
		if($postcode == "") {
			array_push($error, "Voer een postcode in!");
		}
		if(preg_match('/^[1-9][0-9]{4} ? [a-zA-Z]{2}$/', $postcode)) {
			array_push($error, "Voer een geldige postcode in met 4 cijfers en 2 letters!");	
		}
		if($woonplaats == "") {
			array_push($error, "Voer een woonplaats in!");
		}
		if($rijbewijsnummer == "") {
			array_push($error, "Voer een rijbewijsnummer in!");
		}
		if(strlen($rijbewijsnummer) != 10) {
			array_push($error, "Het rijbewijsnummer moet 10 cijfers hebben!");	
		}
		if(!is_numeric($rijbewijsnummer)) {
			array_push($error, "Het rijbewijsnummer mag alleen cijfers bevatten!");
		}
		if($rijbewijs_afgifte == "") {
			array_push($error, "Voer een rijbewijs afgifte in!");
		}
		if($rijbewijs_geldigtot == "") {
			array_push($error, "Voer een rijbewijs geldig tot in!");
		}
		
		//Return de error
		return $error;
	}	

	public function wijzigWachtwoordAction() {
		$anw = [
			'huidig_wachtwoord' => $_POST['huidig_wachtwoord'],
			'nieuw_wachtwoord' => $_POST['nieuw_wachtwoord'],
			'herhaal_wachtwoord' => $_POST['herhaal_wachtwoord']
		];

		$error = $this->checkWachtoord();
		if(!empty($error))
		{
			return [ error => $error, 'anw' => $anw];	
		}
		$updatewachtwoord = $this->AccountModules->wijzigWachtwoord($anw);
		if(!$updatewachtwoord){
			return [ error => 'Opslaan is fout gegaan.'];
		} else {
			return [ message => 'Opslaan is goed gegaan.'];
		}

		return $updatewachtwoord;
	}

	private function checkWachtoord() {
		$user = $_SESSION['username'];
		$huidig_wachtwoord = strip_tags($_POST['huidig_wachtwoord']);
		$nieuw_wachtwoord = strip_tags($_POST['nieuw_wachtwoord']);
		$herhaal_wachtwoord = strip_tags($_POST['herhaal_wachtwoord']);	

		$error = array();

		if($nieuw_wachtwoord == "") {
			array_push($error, "Voer een wachtwoord in!");
		}
		if(strlen($nieuw_wachtwoord) < 6) {
			array_push($error, "Wachtwoord moet minimaal 6 tekens hebben!");	
		}
		if($nieuw_wachtwoord != $herhaal_wachtwoord) {
			array_push($error, "Wachtwoorden komen niet overeen!");
		}
		else {
			$stmt2 = $this->pdo->prepare("SELECT wachtwoord FROM accountgegevens WHERE gebruikersnaam=:username");
			$stmt2->execute(array(":username"=>$user));
			$ww=$stmt2->fetch(PDO::FETCH_ASSOC);
				
			if($ww['wachtwoord'] != $huidig_wachtwoord) {
				$error[] = "Dit wachtwoord klopt niet!";
			}
		}	

		//Return de error
		return $error;
	}
}

?>