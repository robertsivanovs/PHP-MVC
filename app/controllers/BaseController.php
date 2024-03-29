<?php

namespace App\Controllers;
use App\Classes\Database;

/**
 * BaseController : Parent
 * 
 * Main controller, all other controllers will inherit from this controller.
 * 
 */
class BaseController extends Database {
    /**
     * CreateView
     *
     * This method will be used in child controllers to generate views.
     * 
     * @param  mixed $viewName
     *
     * @return void
     */
    public static function CreateView($viewName){
        require_once ("./app/views/$viewName.php");
    }
}