<?php

/*
* Routes
* 
* This file is included in index.php
* Define ROOT_DIRECTORY in config.php
*
*/

include 'config.php';
include 'app/classes/autoloader.php';

$config = new config();
$autoloader = new autoloader();

// Index view
route::set($config::ROOT_DIRECTORY, function() { // Index directory 
    IndexController::CreateView('IndexView');
});

// Register 
route::set($config::ROOT_DIRECTORY . "register/", function() {
    return (new RegisterController())->registerUser();
});
// Login
route::set($config::ROOT_DIRECTORY . "login/", function() {
    return (new LoginController())->loginUser();
  });
// Attributes
route::set($config::ROOT_DIRECTORY . "attributes_submit/", function() {
    return (new AttributesController())->updateAttributes();
});