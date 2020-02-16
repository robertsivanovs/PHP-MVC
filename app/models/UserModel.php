<?php

/**
 * Model for users table.
 * 
 * Contains methods with querrys needed to insert/select user data into/from database.
 */

class UserModel extends database {

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
    public static function checkIfUserExists($username){
        $sql = "SELECT true from users where username=:username";
        $stmt = self::connect()->prepare($sql);
        $stmt->bindValue(':username' , $username);
        $stmt->execute();
        return $stmt->rowCount();
    }
    // Same as above, checks if email exists
    public static function checkIfEmailExists($email){
        $sql = "SELECT true from users where email=:email";
        $stmt = self::connect()->prepare($sql);
        $stmt->bindValue(':email' , $email);
        $stmt->execute();
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
    public static function registerUser($username, $email, $password) {
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = self::connect()->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':email', $email);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindValue(':password' , $hash);
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
    public static function loginUser($email){
        $sql = "SELECT username, password, email from users WHERE BINARY email= BINARY :email";
        $stmt = self::connect()->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // This will return row as an array with username, password and email.
    }
}