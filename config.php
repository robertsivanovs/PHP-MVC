<?php

include 'app/classes/AutoLoader.php';

/**
 * config
 * 
 * Contains configuration needed to run project
 * 
 */

class Config {

    // PROJECT ROOT DIRECTORY
    const ROOT_DIRECTORY = "/home/";

    public function __construct() {

        // PSR-4 autoloader, load all classes, controllers and models
        $autoloader = new App\Classes\AutoLoader\AutoLoader();
        $autoloader->register();
        $autoloader->addNamespace('App\Classes',  __DIR__ . '\app\classes');
        $autoloader->addNamespace('App\Controllers',  __DIR__ . '\app\controllers');
        $autoloader->addNamespace('App\Models',  __DIR__ . '\app\models');

    }

}

?>