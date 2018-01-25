<?php
// @author: Ljubomir Miodrag
$config = require'config.php';
require'sql/connection.php';
require'sql/querybuilder.php';
$pdo = connection::connect($config['database']);
$query = new Querybuilder(connection::connect($config['database']));
$statement = $pdo->prepare("SELECT * FROM `ordernummer` WHERE `klant_id` = 1 OR 1=1");
$result = $statement->execute();
$obj = $statement->fetch();
var_dump($obj);

?>
