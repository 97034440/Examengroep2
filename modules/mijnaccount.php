<?php

require('../init.php');

Class AccountModules {
	
	public $pdo;

	public function __construct() {
		$config = require'../config.php';
		$pdo = connection::connect($config['database']);
		$this->pdo = $pdo;
	  }

	public function accountGegevens() {
		$user = $_SESSION['username'];
	
		$stmt = $this->pdo->prepare("SELECT * FROM accountgegevens WHERE gebruikersnaam=:username");
		$stmt->execute(array(":username"=>$user));
		$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
		
		$stmt = $this->pdo->prepare("SELECT * FROM klantgegevens WHERE id=:id");
		$stmt->execute(array(":id"=>$userRow['klantgegevens_id']));
		$userRow2=$stmt->fetch(PDO::FETCH_ASSOC);

		$stmt = $this->pdo->prepare("SELECT * FROM rijbewijs WHERE klantgegevens_id=:id");
		$stmt->execute(array(":id"=>$userRow['klantgegevens_id']));
		$userRow3=$stmt->fetch(PDO::FETCH_ASSOC);

		$stmt = $this->pdo->prepare("SELECT * FROM rijbewijs_regel WHERE rijbewijsnummer=:rijbewijsnummer");
		$stmt->execute(array(":rijbewijsnummer"=>$userRow3['rijbewijsnummer']));
		$userRow4=$stmt->fetch(PDO::FETCH_ASSOC);		

		$array = [
			'email' => $userRow['email'],
			'voorletters' => $userRow2['voorletters'],
			'tussenvoegsel' => $userRow2['tussenvoegsel'],
			'achternaam' => $userRow2['achternaam'],
			'telefoonnummer' => $userRow2['telefoonnummer'],
			'adres' => $userRow2['adres'],
			'postcode' => $userRow2['postcode'],
			'woonplaats' => $userRow2['woonplaats'],
			'rijbewijsnummer' => $userRow3['rijbewijsnummer'],
			'rijbewijs_afgifte' => $userRow3['rijbewijs_afgifte'],
			'rijbewijs_geldigtot' => $userRow3['rijbewijs_geldigtot'],
			'rijbewijstype_id' => $userRow4['rijbewijstype_id'],
		];
		
		return $array;
	}

	public function accountUpdate() {
		$user = $_SESSION['username'];

		$stmt = $this->pdo->prepare("UPDATE accountgegevens SET email=:email WHERE gebruikersnaam = :username");
		$stmt->execute(array(":email"=>$email, ":username"=>$user));

		$array = [
			'email' => $stmt['email'],
			// 'voorletters' => $userRow2['voorletters'],
			// 'tussenvoegsel' => $userRow2['tussenvoegsel'],
			// 'achternaam' => $userRow2['achternaam'],
			// 'telefoonnummer' => $userRow2['telefoonnummer'],
			// 'adres' => $userRow2['adres'],
			// 'postcode' => $userRow2['postcode'],
			// 'woonplaats' => $userRow2['woonplaats'],
			// 'rijbewijsnummer' => $userRow3['rijbewijsnummer'],
			// 'rijbewijs_afgifte' => $userRow3['rijbewijs_afgifte'],
			// 'rijbewijs_geldigtot' => $userRow3['rijbewijs_geldigtot'],
			// 'rijbewijstype_id' => $userRow4['rijbewijstype_id'],
		];

		return $array;
	}

}


?>