<?php
/**
 * AutoLoader
 * 
 * Loads all files needed to run project
 */
class AutoLoader
{
    public function __construct()
    {
        spl_autoload_register(function ($class) {
            if (file_exists('app/classes/' . $class . '.php')) {
                include 'app/classes/' . $class . '.php';
            } else if (file_exists('app/controllers/' . $class . '.php')) {
                include 'app/controllers/' . $class . '.php';
            } else if (file_exists('app/models/' . $class . '.php')) {
                include 'app/models/' . $class . '.php';
            } else if (file_exists('app/attributes_task/' . $class . '.php')) {
                include 'app/attributes_task/' . $class . '.php';
            }
        });
    }
}
