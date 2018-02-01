<?php
// @author: Ljubomir Miodrag
class Querybuilder {

protected $pdo;

 public function __construct( PDO $pdo ) {
    $this->pdo = $pdo;
  }
  public function selectAll ($table){
    $tableinsert = htmlspecialchars($table);
    $statement = $this->pdo->prepare("select * from {$tableinsert} ORDER BY id ASC");
	$statement->bindParam(':{$tableinsert}', $tableinsert, PDO::PARAM_STR, 10);
    $statement->execute(array("\xbf\x27 OR 1=1 /*"));
    return $statement->fetchAll(PDO::FETCH_CLASS);
  }
  public function selectSpecific ($table, $row, $objectid){
    $tableinsert = htmlspecialchars($table);
    $rowinsert = htmlspecialchars($row);
    $objectidinsert = htmlspecialchars($objectid);
    $statement = $this->pdo->prepare("SELECT * FROM {$tableinsert} WHERE {$rowinsert} = '{$objectidinsert}'");
	$statement->bindParam(':{$tableinsert}', $tableinsert, PDO::PARAM_STR, 10);
	$statement->bindParam(':{$rowinsert}', $rowinsert, PDO::PARAM_STR, 10);
	$statement->bindParam(':{$objectidinsert}', $objectidinsert, PDO::PARAM_INT);
    $statement->execute(array("\xbf\x27 OR 1=1 /*"));
    return $statement->fetchAll(PDO::FETCH_CLASS);
  }
}
