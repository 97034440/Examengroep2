<?php
class Bestel {

protected $pdo;

//constructor heeft database connectie nodig
 public function __construct( PDO $pdo ) {
    $this->pdo = $pdo;
  }
  private $klant;
  private $object;
  private $orderdatum;
  private $datumuit;
  private $datumterug;

  //ontvangt de tabelnaam en de classnaam waar je deze aan koppelt
  public function PlaatsBestelling ($receive){

    $klant = $receive['klant'];
    $object = $receive['object'];
    $orderdatum = $receive['orderdatum'];
    $datumuit = $receive['datumuit'];
    $datumterug = $receive['datumterug'];


    //selecteerd alles uit de tabelnaam die je hebt meegegeven.

    $statement = $this->pdo->prepare("INSERT INTO `examen`.`ordernummer`
      (`ordernummer`, `klant_id`, `test_id`, `object_id`, `orderdatum`, `datum_uit`, `datum_terug`)
      VALUES (NULL, 'testaccount', '2', '3', '2018-01-16', '2018-01-26', '2018-01-31');");
    // statement uitvoeren.
    $statement->execute(array("\xbf\x27 OR 1=1 /*"));
    return $statement->fetchAll(PDO::FETCH_CLASS);
    // alles uit de database lezen.
  }
}
