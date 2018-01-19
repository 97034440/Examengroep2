<?php

class connection {
  //static function voor de connectie zodat deze makerlijker aangemaakt kan worden
  //Voorbeeld $var = Connection::connect(); maakt een variable die connectie met de database
  //functions krijgt ook de gegevens van de database uit een config file deze heet nu config.php
  public static function connect($config)
  {
    try {
      return new PDO (
      $config['connection'].'; dbname='.$config['name'],
      $config['username'],
      $config['password']
    );
    }
    // $e is een object van PDOException
    catch (PDOException $e) {
      echo 'Connection failed: ' . $e->getMessage();
    }
  }
<<<<<<< HEAD

=======
  public function getConnection(){
    return $this->conn;
  }
>>>>>>> 2572f0fecdfd4949ddc8eda6a8baf614777ea69d
}
