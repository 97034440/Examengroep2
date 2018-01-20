<?php
//config file voor de database
return [
    'database' => [
      'name' => 'examen',
      'username' => 'root',
      'password' => 'root',
      'connection' => 'mysql:dbname=examen;host=127.0.0.1',
      'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ]
    ]
]
?>
