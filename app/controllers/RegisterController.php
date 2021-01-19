<?php

require_once './app/models/UserModel.php';


/**
 * RegisterController
 * 
 * Gets $_POST values, validates user input, checks if email, username already exists.
 * Registers user if validation and email, username check was successfull.
 * Returns errors if any.
 * 
 */
class RegisterController extends BaseController
{

    /**
     * registerUser
     *
     * Checks if form was posted, validates user input, calls model to check if E-mail and username
     * are already registered.
     * 
     * Registers user if valid.
     * @return void
     */
    public function registerUser()
    {

        // Check if form was posted
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            Header("Location: ../");
        }

        // Get user input from posted input fields
        $username = $_POST['box-signup__input-name'];
        $password = $_POST['box-signup__input-password'];
        $email = $_POST['box-signup__input-email'];

        // Check if form submit button was pressed
        if (isset($_POST['box-signup__button'])) {

            // Validation
            Validator::checkEmpty("Username", $username)
                ->checkLength("Username", $username)
                ->checkBadSymbols("Username", $username);

                Validator::checkEmail("Email", $email);

                Validator::checkEmpty("Password", $password)
                ->checkLength("Password", $password)
                ->checkBadSymbols("Password", $password);
        }   // If validation failed
        if (!empty(Validator::$error)) {
            self::CreateView("FailedView");

            // Check if username already exists
        } else if (UserModel::checkIfUserExists($username)) {
            Validator::$error = "Username " . htmlspecialchars($username) . " already exists! ";
            self::CreateView("FailedView");

            // Check if email already exists
        } else if (UserModel::checkIfEmailExists($email)) {
            Validator::$error = "Email " . htmlspecialchars($email) . " already exists! ";
            self::CreateView("FailedView");

            // Register user
        } else {
            UserModel::registerUser($username, $email, $password);
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = 'true';
            self::CreateView("loggedView");
        }
    }
}
