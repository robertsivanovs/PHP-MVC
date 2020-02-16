<?php

// Loads all classes, controllers, models.
spl_autoload_register(function($class) {
    if(file_exists('app/classes/'.$class.'.php')) {
        include 'app/classes/'.$class.'.php';
    } else if (file_exists('app/controllers/'.$class.'.php')) {
        include 'app/controllers/'.$class.'.php';
    } else if (file_exists('app/models/'.$class.'.php')) {
        include 'app/models/'.$class.'.php';
    } else if (file_exists('app/attributes_task/'.$class.'.php')) {
        include 'app/attributes_task/'.$class.'.php';
    }
});

// Index view
route::set("/hack/", function() { // Index directory 
    IndexController::CreateView('IndexView');
});

// Register 
route::set("/hack/register/", function() {
    return (new RegisterController())->registerUser();
});
// Login
route::set("/hack/login/", function() {
    return (new LoginController())->loginUser();
  });
// Attributes
route::set("/hack/attributes_submit/", function() {
    return (new AttributesController())->updateAttributes();
});