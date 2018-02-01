<?php
// @author: Ljubomir Miodrag
class connection {
  public static function connect($config)

  {
    try {
      return new PDO (
      $config['connection'].'; dbname='.$config['name'],
      $config['username'],
      $config['password']
    );
    }
    catch (PDOException $e) {
      echo 'Connection failed: ' . $e->getMessage();
    }
  }
}
