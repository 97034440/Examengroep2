<?php

namespace modules;

use \functions\RegisterFunction;

class RegisterModules
{

	public $voorletters;
	public $tussenvoegsels;
	public $achternaam;
	public $gebruikersnaam;
	public $mobiel;
	public $postcode;
	public $rijbewijsnummer;
	public $telefoonnummer;
	
	public static function addUser() {
		$db = static::getDB();
		$voorletters = $_POST['voorletters'];
		$tussenvoegsels = $_POST['tussenvoegsels'];
		$achternaam = $_POST['achternaam'];
		$gebruikersnaam = $_POST['gebruikersnaam'];
		$mobiel = $_POST['mobiel'];
		$postcode = $_POST['postcode'];
		$rijbewijsnummer = $_POST['rijbewijsnummer'];
		$telefoonnummer = $_POST['telefoonnummer'];

		$stmt = $db->prepare("INSERT INTO klantgegevens (voorletters, tussenvoegsels, achternaam, gebruikersnaam, mobiel, postcode, rijbewijsnummer, telefoonnummer) VALUES ('$voorletters', '$tussenvoegsels', '$achternaam', '$gebruikersnaam', '$mobiel', '$postcode', '$rijbewijsnummer', '$telefoonnummer')");
        return $stmt->execute();
	}
}



?>