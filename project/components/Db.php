<?php
namespace Project\Components;

require_once ROOT . '/project/config/connection.php';

class Db
{
    public static function getConnection()
    {
        $dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST;
        return new \PDO($dsn, DB_USER, DB_PASS, [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
    }
}
