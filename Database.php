<?php


class Database
{
    private static $instance;

    public static function getPDO()
    {
        if (self::$instance === null) 
        {
            self::$instance = new PDO("mysql:host=localhost;dbname=ecom_php;charset=utf8", "root", "");
        }

        return self::$instance;
    }
}
