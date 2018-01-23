<?php
$config = require'config.php';
require'sql/connection.php';
require'sql/querybuilder.php';
$pdo = connection::connect($config['database']);
$query = new Querybuilder(connection::connect($config['database']));
$opties = $query->selectAll('optie');
var_dump($opties);
$statement = $pdo->prepare("select * from optie");
$result = $statement->execute();
$obj = $statement->fetch();
var_dump($obj);
