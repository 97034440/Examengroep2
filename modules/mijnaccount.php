<!-- Dit document is gemaakt door Joanne -->
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

		$userRow3['rijbewijs_afgifte'] = date('d-m-Y',strtotime($userRow3['rijbewijs_afgifte']));
		$userRow3['rijbewijs_geldigtot'] = date('d-m-Y',strtotime($userRow3['rijbewijs_geldigtot']));
		
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
		];
		
		return $array;
	}

	public function accountUpdate($anw) {
		try {	
			$this->pdo->beginTransaction();

			$user = $_SESSION['username'];
			$email = $anw['email'];
			$voorletters = $anw['voorletters'];
			$tussenvoegsel = $anw['tussenvoegsel'];
			$achternaam = $anw['achternaam'];
			$telefoonnummer = $anw['telefoonnummer'];
			$adres = $anw['adres'];
			$postcode = $anw['postcode'];
			$woonplaats = $anw['woonplaats'];
			$rijbewijsnummer = $anw['rijbewijsnummer'];
			$rijbewijs_afgifte = $anw['rijbewijs_afgifte'];
			$datum_afgifte = date('Y-m-d',strtotime($rijbewijs_afgifte));
			$rijbewijs_geldigtot = $anw['rijbewijs_geldigtot'];
			$datum_geldigtot = date('Y-m-d',strtotime($rijbewijs_geldigtot));

			$stmt = $this->pdo->prepare("UPDATE accountgegevens SET email=:email WHERE gebruikersnaam = :username");
			$stmt->execute(array(':email'=>$email, ':username'=>$user));

			$stmt2 = $this->pdo->prepare("SELECT * FROM accountgegevens WHERE gebruikersnaam=:username");
			$stmt2->execute(array(":username"=>$user));
			$userRow=$stmt2->fetch(PDO::FETCH_ASSOC);

			$stmt3 = $this->pdo->prepare("UPDATE klantgegevens SET voorletters=:voorletters, tussenvoegsel=:tussenvoegsel, achternaam=:achternaam, telefoonnummer=:telefoonnummer, adres=:adres, postcode=:postcode, woonplaats=:woonplaats WHERE id=:id");
			$stmt3->execute(array(':voorletters'=>$voorletters, ':tussenvoegsel'=>$tussenvoegsel,':achternaam'=>$achternaam, ':telefoonnummer'=>$telefoonnummer, ':adres'=>$adres, ':postcode'=>$postcode, ':woonplaats'=>$woonplaats, ':id'=>$userRow['klantgegevens_id']));

			$stmt4 = $this->pdo->prepare("UPDATE rijbewijs SET rijbewijsnummer=:rijbewijsnummer, rijbewijs_afgifte=:rijbewijs_afgifte, rijbewijs_geldigtot=:rijbewijs_geldigtot WHERE klantgegevens_id=:id");
			$stmt4->execute(array(':rijbewijsnummer'=>$rijbewijsnummer, ':rijbewijs_afgifte'=>$datum_afgifte, ':rijbewijs_geldigtot'=>$datum_geldigtot, ':id'=>$userRow['klantgegevens_id']));

			$this->pdo->commit();
			return true;
		}

		catch(PDOException $error)
		{
			$this->pdo->rollback();
			echo $error->getMessage();
			return false;
		}
	}

	public function wijzigWachtwoord($anw) {
		try {
			$this->pdo->beginTransaction();

			$user = $_SESSION['username'];
			$huidig_wachtwoord = $anw['huidig_wachtwoord'];
			$nieuw_wachtwoord = $anw['nieuw_wachtwoord'];
			$herhaal_wachtwoord = $anw['herhaal_wachtwoord'];

			$stmt = $this->pdo->prepare("UPDATE accountgegevens SET wachtwoord=:nieuw_wachtwoord WHERE gebruikersnaam =:username");
			$stmt->execute(array(':nieuw_wachtwoord'=>$nieuw_wachtwoord, ':username'=>$user));

			$this->pdo->commit();
		        return true;
	    }

    	catch(PDOException $error)
		{
			$this->pdo->rollback();
			echo $error->getMessage();
			return false;
		}
	}
}


?>