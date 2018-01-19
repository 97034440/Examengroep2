<?php
$query = require'init.php';
$config = require'config.php';

$connect = Connection::connect($config['database']);

$statement = $connect->prepare("SELECT (object.imageid) FROM object
INNER JOIN objectimage ON object.imageid = objectimage.imageid WHERE object.imageid = '1'");

$statement->execute();

var_dump($statement);
