<?php
$config = require'config.php';
require'sql/connection.php';
require'sql/querybuilder.php';

$register = new RegisterModules(connection::connect($config['database']));

require'modules/register.php';
// returnt nieuwe querybuilder class en voegt aan deze de pdo connectie toe.
return new querybuilder(
  //roept static function van de connection class aan
  //en heeft deze mee aand de querybuilder
    connection::connect($config['database'])
  );
?>
