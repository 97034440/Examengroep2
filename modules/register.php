<!-- Dit document is gemaakt door Joanne -->
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

	public function addAccountgegevens($anw) {
		try {
			$this->pdo->beginTransaction();
			//eerste insert variablen
			$achternaam = $anw['achternaam'];
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
			$rijbewijs_B = isset($_POST['rijbewijs_B']) ? '1' : '0';
			$rijbewijs_BE = isset($_POST['rijbewijs_BE']) ? '2' : '0';
			$rijbewijs_C = isset($_POST['rijbewijs_C']) ? '3' : '0';
			$rijbewijs_CE = isset($_POST['rijbewijs_CE']) ? '4' : '0';

			$stmt = $this->pdo->prepare("INSERT INTO klantgegevens (achternaam, adres, postcode, woonplaats, telefoonnummer, tussenvoegsel, voorletters) VALUES (:achternaam, :adres, :postcode, :woonplaats, :telefoonnummer, :tussenvoegsel, :voorletters)");
	        $stmt->execute(array(':achternaam' => $achternaam, ':adres' => $adres, ':postcode' => $postcode, ':woonplaats' => $woonplaats, ':telefoonnummer' => $telefoonnummer, ':tussenvoegsel' => $tussenvoegsel, ':voorletters' => $voorletters));
	        $lastid = $this->pdo->LastInsertId();

			$stmt2 = $this->pdo->prepare("INSERT INTO accountgegevens (email, gebruikersnaam, status, admin, wachtwoord, klantgegevens_id) VALUES (:email, :gebruikersnaam, :status, :admin, :wachtwoord, :klantgegevens_id)");
		    $stmt2->execute(array(':email' => $email, ':gebruikersnaam' => $gebruikersnaam, ':status' => $status, ':admin' => $admin, ':wachtwoord' => $wachtwoord, ':klantgegevens_id' => $lastid));

	        $stmt3 = $this->pdo->prepare("INSERT INTO rijbewijs (klantgegevens_id, rijbewijsnummer, rijbewijs_afgifte, rijbewijs_geldigtot) VALUES (:klantgegevens_id, :rijbewijsnummer, :rijbewijs_afgifte, :rijbewijs_geldigtot)");
	        $stmt3->execute(array(':klantgegevens_id' => $lastid, ':rijbewijsnummer' => $rijbewijsnummer, ':rijbewijs_afgifte' => $datum_afgifte, ':rijbewijs_geldigtot' => $datum_geldigtot));

	        if($rijbewijs_B = $rijbewijs_B){
	           $stmt4 = $this->pdo->prepare("INSERT INTO rijbewijsregel (rijbewijstype_id, rijbewijsnummer) VALUES (:rijbewijs_B, :rijbewijsnummer)");
	           $stmt4->execute(array(':rijbewijs_B' => $rijbewijs_B, ':rijbewijsnummer' => $rijbewijsnummer));
	        }
	        if ($rijbewijs_BE = $rijbewijs_BE){
	           $stmt5 = $this->pdo->prepare("INSERT INTO rijbewijsregel (rijbewijstype_id, rijbewijsnummer) VALUES (:rijbewijs_BE, :rijbewijsnummer)");
	           $stmt5->execute(array(':rijbewijs_BE' => $rijbewijs_BE, ':rijbewijsnummer' => $rijbewijsnummer));
	        }
	        if ($rijbewijs_C = $rijbewijs_C){
	           $stmt6 = $this->pdo->prepare("INSERT INTO rijbewijsregel (rijbewijstype_id, rijbewijsnummer) VALUES (:rijbewijs_C, :rijbewijsnummer)");
	           $stmt6->execute(array(':rijbewijs_C' => $rijbewijs_C, ':rijbewijsnummer' => $rijbewijsnummer));
	        }
	        if ($rijbewijs_CE = $rijbewijs_CE){
	           $stmt7 = $this->pdo->prepare("INSERT INTO rijbewijsregel (rijbewijstype_id, rijbewijsnummer) VALUES (:rijbewijs_CE, :rijbewijsnummer)");
	           $stmt7->execute(array(':rijbewijs_CE' => $rijbewijs_CE, ':rijbewijsnummer' => $rijbewijsnummer));
	        }
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
