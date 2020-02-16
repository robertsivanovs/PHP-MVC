<?php
/**
 * database class @author Roberts Ivanovs
 * Establishes connection with database
 */
class database {

    private static $host = "localhost";
    private static $dbName = "test";
    private static $username = "root";
    private static $password = "";


    /**
     * connect
     * Connects to database
     * @return void
     */
    public static function connect (){
        $pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName."; charset=UTF8", self::$username, self::$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $pdo;
    }
}