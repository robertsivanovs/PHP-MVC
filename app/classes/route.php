<?php

/**
 * Route class to compare URL with valid route and call a controller if URL matches route.
 */
class route {
    
    public static $validRoutes = array();

    /**
     * set
     *
     * Recieves route as a paremeter and inserts value into $validRoutes[]
     * Recieves function as a second parameter and executes it if URL matches route. (calls controller method)
     * 
     * @param  mixed $route
     * @param  mixed $function
     *
     * @return void
     */
    public static function set($route, $function){
        self::$validRoutes[] = $route;
        $uri = $_SERVER['REQUEST_URI'];
        $uri = strtolower($uri);
        
        // Index view
        if ($route == "/") {
           return $function->__invoke();
        }

        if ($uri == $route) {
            return $function->__invoke();
        }
    }
}