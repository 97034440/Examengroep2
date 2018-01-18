<?php



$config = require'config.php';
require'database/connection.php';
require'database/querybuilder.php';
$var = Connection::connect($config['database']);
// returnt nieuwe querybuilder class en voegt aan deze de pdo connectie toe.


return new querybuilder(
  //roept static function van de connection class aan
  //en heeft deze mee aand de querybuilder
    connection::connect($config['database'])
  );

?>
