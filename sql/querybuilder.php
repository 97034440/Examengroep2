<?php
class querybuilder {

protected $pdo;

//constructor heeft database connectie nodig
 public function __construct( PDO $pdo ) {
    $this->pdo = $pdo;
  }
  //ontvangt de tabelnaam en de classnaam waar je deze aan koppelt
  public function selectAll ($table){
    //selecteerd alles uit de tabelnaam die je hebt meegegeven.
    $statement = $this->pdo->prepare("select * from {$table}");
    // statement uitvoeren.
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_CLASS);
    // alles uit de database lezen.
  }
  public function selectSpecific ($tablename, $fromname ){
    //selecteerd alles uit de tabelnaam die je hebt meegegeven.
    $statement = $this->pdo->prepare("select count ($fromname) from {$tablename}
    inner join objectimage on ($fromname) = ($fromname) where

    WHERE imageid = {$fromname}");

    // statement uitvoeren.
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_CLASS);
    // alles uit de database lezen.
  }

}
