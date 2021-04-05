<?php

namespace App\Classes;

/**
 * Validation class to validate and sanitize user input
 */

class Validator {

    public static $error;

    /**
     * checkLength
     *
     * Checks if $value is atleast 5 symbols long.
     * 
     * @param  mixed $field
     * @param  mixed $value
     *
     * @return void
     */
    public static function checkLength($field, $value){
        if (strlen($value) < 5 ) {
            self::$error = "$field must contain atleast 5 symbols!";
        }
        return new static;
    }

    /**
     * checkEmpty
     * 
     * Chacks if $value is not epmpty
     *
     * @param  mixed $field
     * @param  mixed $value
     *
     * @return void
     */
    public static function checkEmpty($field, $value){
        if (empty($value)) {
            self::$error = "$field cannot be empty!";
        }
        return new static;
    }

    /**
     * checkBadSymbols
     * 
     * Checks if $value contains bad characters | Only alphanummeric allowed.
     *
     * @param  mixed $field
     * @param  mixed $value
     *
     * @return void
     */
    public static function checkBadSymbols($field, $value) {
        if (preg_match("/[^A-Za-z0-9]/", $value)) {
            self::$error = "$field contains bad characters!";
        }
        return new static;
    }

    /**
     * checkEmail
     * 
     * Email format validation
     *
     * @param  mixed $field
     * @param  mixed $value
     *
     * @return void
     */
    public static function checkEmail($field, $value){
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            self::$error = "$field Incorrect email format!";
        }
        return new static;
    }

    /**
     * checkBadAttribute
     *
     * Method checks attributes for bad symbols | Alphanummeric | white space |  . (Dots) allowed.
     * 
     * @param  mixed $field
     * @param  mixed $value
     *
     * @return void
     */
    public static function checkBadAttribute($field, $value){
        if (preg_match("/[^A-Za-z0-9 .]/", $value)) {
            self::$error = "$field Contains bad characters!";
        }
        return new static;
    }

    /**
     * showErrors
     * 
     * Used to return errors for views
     *
     * @return void
     */
    public static function showErrors(){
        return self::$error;
    }
}