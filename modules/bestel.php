<?php
class Reserveer {

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
  public function Save ($value1,$value2,$value3,$value4,$value5){
    $klantid = htmlspecialchars($value1);
    $object = htmlspecialchars($value2);
    $newDate = date("Y-m-d", strtotime($value3));
    $currentDate = htmlspecialchars($newDate);
    $datumuit = date("Y-m-d", strtotime($value4));
    $datumuitgave = htmlspecialchars($datumuit);
    $datumterug = date("Y-m-d", strtotime($value5));
    $datumteruggave = htmlspecialchars($datumterug);
    //selecteerd alles uit de tabelnaam die je hebt meegegeven.
    $statement = $this->pdo->prepare("INSERT INTO `examen`.`ordernummer`
      (`ordernummer`, `klant_id`, `object_id`, `orderdatum`, `datum_uit`, `datum_terug`)
      VALUES (NULL, '{$klantid}', {$object}, '{$currentDate}', '{$datumuitgave}', '{$datumteruggave}');");
    // statement uitvoeren.
    $statement->execute();
    // alles uit de database lezen.
  }
}
