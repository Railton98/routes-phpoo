<?php

namespace app\database;

use PDO;

class Connection
{
    private static $connection = null;

    public  static function connect()
    {
        if (!self::$connection) {
            self::$connection = new PDO('mysql:host=mysql;dbname=phpoo', 'phpoo', 'phpoo', [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
        }

        return self::$connection;
    }
}
