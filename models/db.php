<?php
include_once('./config.php');
class Db
{
    public static $connection;
    public function __construct()
    {
        if (!self::$connection) {
            self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
            self::$connection->set_charset(DB_CHARSET);
        }
        return self::$connection;
    }
}