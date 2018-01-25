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
		// userRow
		
		// dan de volgende gegevens ophalen
		$stmt = $this->pdo->prepare("SELECT * FROM klantgegevens WHERE id=:id");
		$stmt->execute(array(":id"=>$userRow['klantgegevens_id']));
		$userRow2=$stmt->fetch(PDO::FETCH_ASSOC);
		//userRow2 (!!!)

		$array = [
			'voornaam' => $userRow2['voornaam'],
			'tussenvoegsel' => $userRow2['tussenvoegsel'],
			'achternaam' => $userRow2['achternaam'],
			'email' => $userRow['email'],
			'telefoonnummer' => $userRow2['telefoonnummer'],
			'adres' => $userRow2['adres'],
			'postcode' => $userRow2['postcode'],
			'woonplaats' => $userRow2['woonplaats'],
		];
		
		return $array;
	}

	public function klantGegevens() {

	}


// $stmt = $this->pdo->prepare("SELECT 
// 										voorletters,
// 										tussenvoegsel,
// 										achternaam, 
// 										telefoonnummer,
// 										adres, 
// 										postcode,
// 										woonplaats,
// 										klantgegevens_id
// 									FROM 
// 										klantgegevens 
// 									INNER join
// 										accountgegevens
// 									WHERE id=:klantgegevens_id");
}


?>