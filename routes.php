<?php

/*
* Routes
* 
* This file is included in index.php
* Define ROOT_DIRECTORY in config.php
*
*/

include 'Config.php';
include 'app/classes/AutoLoader.php';

$config = new config();
$autoloader = new AutoLoader();

// Index view
Route::set($config::ROOT_DIRECTORY, function() { // Index directory 
    IndexController::CreateView('IndexView');
});

// Register 
Route::set($config::ROOT_DIRECTORY . "register/", function() {
    return (new RegisterController())->registerUser();
});
// Login
Route::set($config::ROOT_DIRECTORY . "login/", function() {
    return (new LoginController())->loginUser();
  });