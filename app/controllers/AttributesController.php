<?php

/**
 * Attributes Controller
 * 
 * Gathers all user input, Validates input and stores attributes + values into database.
 */

Class AttributesController extends BaseController {

    /**
     * updateAttributes
     * Checks if form was posted, gathers users input, validates input, updates table.
     * @return void
     */
    public function updateAttributes() {
        // Check if form was posted
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            Header("Location: ../");
        }

        $size = $_POST['counter'];
        $att = array();
        $val = array();

        // Get user input, store into arrays
        for($i = 1; $i <= $size; $i++){
            $att[] = $_POST['att-'.$i];
            $val[] = $_POST['val-'.$i];
        }

        // Validate
        foreach($att as $value){
            Validator::checkEmpty("Attribute", $value)->
            checkBadAttribute("Attribute", $value)->
            checkEmpty("Attribute", $value);
        }
        foreach($val as $value){
            Validator::checkEmpty("Attribute value", $value)->
            checkBadAttribute("Attribute value", $value)->
            checkEmpty("Attribute value", $value);
        }
        // If validation fails
        if (!empty(Validator::$error)) {
            return self::CreateView("FailedView");
        }

        // Store attributes in database
        if (AttributeModel::insertAttribute($att, $val)) {
            return self::createView("AttributesView");
        }
    }
}