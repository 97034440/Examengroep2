<?php

namespace App\Models;

use PDO;
use \App\Models\Home as HomeController;


class Home extends \Core\Model
{

    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM object');
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, '\App\Models\HomeModel');
        return $stmt->fetchAll();
    }
}
