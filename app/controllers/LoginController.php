<?php

/**
 * LoginController
 * 
 * Collects $_POST values, Validates user input and logs in user.
 * Returns error if no such e-mail found or password was incorrect.
 */

class LoginController extends BaseController {

    /**
     * loginUser
     * Checks if form was posted, validates user input, checks if specified email found in database.
     * Returns error if no email was found or user password was incorrect.
     * @return void
     */
    public function loginUser() {

        // Check if form was posted
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return Header("Location: ../");
        }

        // Check if form submit button was pressed
        if (!isset($_POST['box-login__button'])) {
            return Header("Location: ../");
        }

        $email = $_POST['box-login__input-email'];
        $password = $_POST['box-login__input-password'];

        // Validation
        Validator::checkEmail("Email", $email);

        Validator::checkEmpty("Password", $password)
            ->checkLength("Password", $password)
            ->checkBadSymbols("Password", $password);

        // If validation fails
        if (!empty(Validator::$error)) {
            return self::CreateView("FailedView");
        }
        // Login user
        $userData = UserModel::loginUser($email);

        // If $userData returned empty means no email was found in DB
        if (!$userData) {
            Validator::$error = " No such Email!";
            return self::CreateView("FailedView");
        }

        $passwordHash = $userData['password']; // Hashed password

        if (isset($passwordHash)) {
            if (password_verify($password, $passwordHash)) { // Login user
                session_start();
                $_SESSION['username'] = $userData['username']; // Username
                $_SESSION['loggedin'] = 'true';
                return self::CreateView("loggedView");
            } else {
                Validator::$error = "Incorrect Password!";
                return self::CreateView("FailedView");
            }
        }
    }
}
