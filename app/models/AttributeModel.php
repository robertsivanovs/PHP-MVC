<?php

/**
 * AttributeModel
 * 
 * Seperate model for seperate table (attributes)
 * 
 * Contains methods with querrys needed to insert attributes/attribute values into database.
 */

require_once './app/classes/database.php';

class AttributeModel extends Database {
    
    /**
     * insertAttribute
     *
     * Loops trough the size of an array (which contains attributes) and Inserts attributes, values into table-attributes
     * 
     * @return boolean $stmt
     * @param  mixed $att
     * @param  mixed $val
     *
     * @return void
     */
    public static function insertAttribute($att, $val) {
        $size = sizeof($att);
        for ($i = 0; $i < $size; $i++){
            $sql = "INSERT INTO attributes (attribute, attribute_val) VALUES (:attribute, :attribute_value)";
            $stmt = self::connect()->prepare($sql);
            $stmt->bindValue(':attribute' , $att[$i]);
            $stmt->bindValue(':attribute_value' , $val[$i]);
            return $stmt->execute();
        }
    }
}