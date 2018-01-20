<?php

class connection {
  //static function voor de connectie zodat deze makerlijker aangemaakt kan worden
  //Voorbeeld $pdo = connection::connect($config['database']); maakt een variable die connectie met de database maakt
  //database connection heeft wel gegevens nodig van de config.php
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
  // public function getConnection(){
  //   return $this->conn;
  // }
}
