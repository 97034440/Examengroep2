<?php
$config = require'config.php';
require'sql/connection.php';
require'sql/querybuilder.php';
<<<<<<< HEAD
=======
require'modules/user.php';
// returnt nieuwe querybuilder class en voegt aan deze de pdo connectie toe.
return new querybuilder(
  //roept static function van de connection class aan
  //en heeft deze mee aand de querybuilder
    connection::connect($config['database'])
  );

>>>>>>> 233c76219f63f9a1ec3781cb1fede734cea94ffb
?>
