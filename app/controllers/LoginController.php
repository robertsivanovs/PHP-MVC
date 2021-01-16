<?php

/**
 * LoginController
 * 
 * Collects $_POST values, Validates user input and logs in user.
 * Returns error if no such e-mail found or password was incorrect.
 */

class LoginController extends BaseController
{

    /**
     * loginUser
     * Checks if form was posted, validates user input, checks if specified email found in database.
     * Returns error if no email was found or user password was incorrect.
     * @return void
     */
    public function loginUser()
    {

        // Check if form was posted
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            Header("Location: ../");
        }

        $email = $_POST['box-login__input-email'];
        $password = $_POST['box-login__input-password'];

        // Validation
        validator::checkEmail("Email", $email);
        validator::checkEmpty("Password", $password)
            ->checkLength("Password", $password)
            ->checkBadSymbols("Password", $password);

        // If validation fails
        if (!empty(validator::$error)) {
            self::CreateView("FailedView");
        }
        // Login user
        $userData = UserModel::loginUser($email);

        if ($userData) {
            $passwordHash = $userData['password']; // Hashed password
        } else {
            validator::$error = " No such Email!"; // If $userData returned empty means no email was found in DB
            self::CreateView("FailedView");
        }
        if (isset($passwordHash)) {
            if (password_verify($password, $passwordHash)) { // Login user
                session_start();
                $_SESSION['username'] = $userData['username']; // Username
                $_SESSION['loggedin'] = 'true';
                self::CreateView("loggedView");
            } else {
                validator::$error = "Incorrect Password!";
                self::CreateView("FailedView");
            }
        }
    }
}
