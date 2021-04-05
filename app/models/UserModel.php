<?php

namespace App\Models;
use App\Classes\Database;
use \PDO;
use \PDOException;

/**
 * Model for users table.
 * 
 * Contains methods with querrys needed to insert/select user data into/from database.
 */

class UserModel extends Database
{

    /**
     * checkIfUserExists
     *
     * Checks if $username exists in user table.
     * Returns true if exists, null if doesn't.
     * 
     * @param  mixed $username
     *
     * @return void
     */
    public static function checkIfUserExists($username)
    {
        try {
            $sql = "SELECT true from users where username=:username";
            $stmt = self::connect()->prepare($sql);
            $stmt->bindValue(':username', $username);
            $stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $stmt->rowCount();
    }    
    /**
     * checkIfEmailExists
     * 
     * Checks if $email exists in user table.
     * Returns true if exists, null if doesn't.
     *
     * @param  mixed $email
     * @return void
     */
    public static function checkIfEmailExists($email)
    {
        try {
            $sql = "SELECT true from users where email=:email";
            $stmt = self::connect()->prepare($sql);
            $stmt->bindValue(':email', $email);
            $stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $stmt->rowCount();
    }

    /**
     * registerUser
     *
     * Inserts username, email and password into table.
     * Hashes password.
     * 
     * @param  mixed $username
     * @param  mixed $email
     * @param  mixed $password
     *
     * @return void
     */
    public static function registerUser($username, $email, $password)
    {
        try {
            $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
            $stmt = self::connect()->prepare($sql);
            $stmt->bindValue(':username', $username);
            $stmt->bindValue(':email', $email);
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bindValue(':password', $hash);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $stmt->execute();
    }

    /**
     * loginUser
     *
     * Selects password, email, username from table
     * returns an array containing password, email, username if $email exists.
     * @return array
     * 
     * @param  mixed $email
     * @param  mixed $password
     *
     * @return void
     */
    public static function loginUser($email)
    {
        try {
            $sql = "SELECT username, password, email from users WHERE BINARY email= BINARY :email";
            $stmt = self::connect()->prepare($sql);
            $stmt->bindValue(':email', $email);
            $stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $stmt->fetch(PDO::FETCH_ASSOC); // This will return row as an array with username, password and email.
    }
}
