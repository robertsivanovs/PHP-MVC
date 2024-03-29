<?php

namespace App\Classes;

use \PDO;
use \PDOException;

/**
 * Database class @author Roberts Ivanovs
 * Establishes connection with database
 */
class Database {

    private static $host = "localhost";
    private static $dbName = "db_name";
    private static $username = "root";
    private static $password = "";

    /**
     * connect
     * Connects to database
     * @return void
     */
    public static function connect () {
        try {
            $pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName."; charset=UTF8", self::$username, self::$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e){
            die($e->getMessage());
        }
        return $pdo;
    }
}