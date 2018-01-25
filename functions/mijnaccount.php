<?php
session_start();
$user = $_SESSION['username'];

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

	public function getKlantAction() {
		$klantgegevens_id = $this->AccountModules->accountgegevens();
		$klantgegevens = $this->AccountModules->klantGegevens();
		return $klantgegevens_id;
		return $klantgegevens;
	}

	public function editAccountAction() {
		$anw = [
			'voorletters' => $_POST['voorletters'],
			'tussenvoegsel' => $_POST['tussenvoegsel'],
			'achternaam' => $_POST['achternaam'],
			'email' => $_POST['email'],
			'gebruikersnaam' => $_POST['gebruikersnaam'],
			'wachtwoord' => $_POST['wachtwoord'],
			'wachtwoord_controle' => $_POST['wachtwoord_controle'],
			'telefoonnummer' => $_POST['telefoonnummer'],
			'adres' => $_POST['adres'],
			'postcode' => $_POST['postcode'],
			'woonplaats' => $_POST['woonplaats'],
			'rijbewijsnummer' => $_POST['rijbewijsnummer'],
			'rijbewijs_afgifte' => $_POST['rijbewijs_afgifte'],
			'rijbewijs_geldigtot' => $_POST['rijbewijs_geldigtot']
		];
	}

}

?>