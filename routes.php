<?php

/*
* Routes
* 
* This file is included in index.php
* Define ROOT_DIRECTORY in config.php
*
*/

include 'Config.php';
$config = new config();

// Index view
App\Classes\Route::set($config::ROOT_DIRECTORY, function() { // Index directory 
    App\Controllers\IndexController::CreateView('IndexView');
});

// Register 
App\Classes\Route::set($config::ROOT_DIRECTORY . "register/", function() {
    return (new App\Controllers\RegisterController())->registerUser();
});
// Login
App\Classes\Route::set($config::ROOT_DIRECTORY . "login/", function() {
    return (new App\Controllers\LoginController())->loginUser();
  });