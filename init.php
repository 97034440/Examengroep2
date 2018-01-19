<?php
$config = require'config.php';
require'sql/connection.php';
require'sql/querybuilder.php';
<<<<<<< HEAD
$register = new RegisterModules(connection::connect($config['database']));
=======
require'modules/register.php';
// returnt nieuwe querybuilder class en voegt aan deze de pdo connectie toe.
return new querybuilder(
  //roept static function van de connection class aan
  //en heeft deze mee aand de querybuilder
    connection::connect($config['database'])
  );
>>>>>>> 2f179c30d994401db48a9afac5e8a7e1a40338f1
?>
