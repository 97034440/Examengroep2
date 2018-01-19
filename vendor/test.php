<?php
$query = require'init.php';
$config = require'config.php';

try{
    $dbh = connection::connect($config['database']);
    die(json_encode(array('outcome' => true)));
}
catch(PDOException $ex){
    die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
}

for more
