<?php
$config = require'config.php';
require'sql/connection.php';
require'sql/querybuilder.php';
$pdo = connection::connect($config['database']);
$query = new Querybuilder(connection::connect($config['database']));

$statement = $pdo->prepare("INSERT INTO `examen`.`ordernummer`
  (`ordernummer`, `klant_id`, `test_id`, `object_id`, `orderdatum`, `datum_uit`, `datum_terug`)
  VALUES (NULL, 'testaccount', '2', '3', '2018-01-16', '2018-01-26', '2018-01-31');");
$result = $statement->execute();
$obj = $statement->fetch();
var_dump($obj);

?>
