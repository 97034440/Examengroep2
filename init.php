<?php
$config = require'config.php';
require'sql/connection.php';
require'sql/querybuilder.php';
$register = new RegisterModules(connection::connect($config['database']));
?>
