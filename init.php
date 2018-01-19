<?php

require_once('css/style.css');
$config = require'config.php';
require'sql/connection.php';
require'sql/querybuilder.php';
// returnt nieuwe querybuilder class en voegt aan deze de pdo connectie toe.
return new querybuilder(
  //roept static function van de connection class aan
  //en heeft deze mee aand de querybuilder
    connection::connect($config['database'])
  );


class Init
{

	private $connection;
	private $conn;

	function __construct()
	{
		$this->connection = new Connection();
		$this->conn = $this->connection->getConnection();
	}

	public function getConnection(){
		return $this->conn;
	}
}
?>
