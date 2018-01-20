<?php
$config = require'config.php';
require'sql/connection.php';

$pdo = connection::connect($config['database']);

$statement = $pdo->prepare("select * from object");
$result = $statement->execute();
$obj = $statement->fetch();
var_dump($obj);
