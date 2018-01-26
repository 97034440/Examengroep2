<?php
// @author: Ljubomir Miodrag
class Querybuilder {

protected $pdo;

//constructor heeft database connectie nodig
 public function __construct( PDO $pdo ) {
    $this->pdo = $pdo;
  }
  //ontvangt de tabelnaam en de classnaam waar je deze aan koppelt
  public function selectAll ($table){
    //nieuwe variable die alleen html karakters in heeft it $table.
    $tableinsert = htmlspecialchars($table);
    //select statement die alles uit de table naam selecteerd die meegegeven is aan de class.
    $statement = $this->pdo->prepare("select * from {$tableinsert} ORDER BY id ASC");
    // statement uitvoeren.
    $statement->execute(array("\xbf\x27 OR 1=1 /*"));
    return $statement->fetchAll(PDO::FETCH_CLASS);
    // alles uit de database lezen.
  }
  public function selectSpecific ($table, $row, $objectid){
    $tableinsert = htmlspecialchars($table);
    $rowinsert = htmlspecialchars($row);
    $objectidinsert = htmlspecialchars($objectid);
    //selecteerd alles uit de tabelnaam en rows die je hebt meegegeven.
    $statement = $this->pdo->prepare("SELECT * FROM {$tableinsert} WHERE {$rowinsert} = '{$objectidinsert}'");
    // statement uitvoeren.
    $statement->execute(array("\xbf\x27 OR 1=1 /*"));
    return $statement->fetchAll(PDO::FETCH_CLASS);
    // alles uit de database lezen.
  }
}
