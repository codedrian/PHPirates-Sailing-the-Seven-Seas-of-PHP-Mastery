<?php
session_start();
require_once("connection.php");

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    //NOTE: For registration
    if (isset($_POST['action']) && $_POST['action'] == 'submit_registration') {

        //NOTE: Name validations and sanitation
        if (strlen($_POST['first_name']) < 2) {
            $errors[] = "First name must be 2 characters long!";
        } else if (preg_match('/\d/', $_POST['first_name'])) {
            $errors[] = "First name must not contain number!";
        } else if (strlen($_POST['first_name']) == 0) {
            $errors[] = "First name is required!";
        } else {
            $first_name = isset($_POST['first_name']) ? filter_var($_POST['first_name'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
        }

        if (strlen($_POST['last_name']) < 2) {
            $errors[] = "Last name must be 2 characters long!";
        }
        else if (preg_match('/\d/', $_POST['last_name'])) {
            $errors[] = "Last name must not contain number!";
        }
        else if (strlen($_POST['last_name']) == 0) {
            $errors[] = "Last name is required!";
        } else {
            $last_name = isset($_POST['last_name']) ? filter_var($_POST['last_name'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
        }
        //NOTE: Validation and sanitation for Phone number
        if (strlen($_POST['phone_number']) == 0) {
            $errors[] = "Phone number is required!";
        }
        else if (preg_match('/[a-zA-Z]/', $_POST['phone_number'])) {
            $errors[] = "Phone number is required and must not contain letter!";
        } else {
            $phone_number = isset($_POST['phone_number']) ? filter_var($_POST['phone_number'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
        }
        //NOTE: Validation and sanitation for Password
        if (strlen($_POST['password']) == 0) {
            $errors[] = "Password is required!";
        } else if (strlen($_POST['password']) < 8) {
            $errors[] = "Password length must be greater than 8!";
        } else {
            $password = isset($_POST['password']) ? filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
            //TODO: Change the password hash using Argon2id algorithm
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        }
        //NOTE: Validation and sanitation for confirm password
        if (strlen($_POST['confirm_password']) == 0) {
            $errors[] = "Please confirm your password!";
        } else if (($_POST['confirm_password'] !== $_POST['password'])) {
            $errors = "Password don't match!";
        } else {
                $confirm_password = isset($_POST['confirm_password']) ? filter_var($_POST['confirm_password'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header('Location: index.php');
            exit();
        } else {
            //I used prepared statements here
            $query = "INSERT INTO auth1_users (first_name, last_name, phone_number, hashed_password)
                VALUES (?, ?, ?, ?)";
            $statement = $connection->prepare($query);
            $statement->bind_param('ssss', $first_name, $last_name, $phone_number, $hashed_password);
            $statement->execute();
            $statement->close();
            header('Location: dashboard.php');
            exit();
        }
    }
    //NOTE: For logging in
    if (isset($_POST['action']) && $_POST['action'] == 'submit_login') {
        $errors = [];
        if (strlen($_POST['phone_number']) == 0) {
            $errors[] = 'Please enter a phone number';
        }
        if (strlen($_POST['password']) == 0) {
            $errors[] = 'Please enter a password';
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header('Location: index.php');
            exit();
        }
        else {
            $phone_number = (isset($_POST['phone_number'])) ? $_POST['phone_number'] : '';
            $password = (isset($_POST['password'])) ? $_POST['password'] : '';

            $query = "SELECT hashed_password FROM auth1_users WHERE phone_number = ?";
            $statement = $connection->prepare($query);
            $statement->bind_param('s', $phone_number);
            $statement->execute();
            $statement->bind_result($hashedPassword);
            $statement->fetch();
            $statement->close();

            if (password_verify($password, $hashedPassword,)) {
                $_SESSION['is_logged_in'] = TRUE;
                header('Location: dashboard.php');
                exit();
            } else {
                $messages[] = 'User not found.';
                $_SESSION['messages'] = $messages;
                header('Location: index.php');
                exit();
            }
        }
    }
    //NOTE: For resetting password
    if (isset($_POST['action']) && $_POST['action'] == 'reset_password_form') {
        if (strlen($_POST['phone_number']) == 0) {
            $error = 'Please enter your phone number to reset!';
        }
        if (!empty($error)) {
            $_SESSION['error'] = $error;
            header('Location: reset_password.php');
            exit();
        } else {
            $phone_number = (isset($_POST['phone_number'])) ? filter_var($_POST['phone_number'], FILTER_SANITIZE_SPECIAL_CHARS) : '';

            $query = "SELECT phone_number FROM auth1_users WHERE phone_number = ?";
            $statement = $connection->prepare($query);
            $statement->bind_param('s', $phone_number);
            $statement->execute();
            $statement->bind_result($result_phone_number);
            $statement->fetch();
            $statement->close();

            if ($result_phone_number) {
                $message = 'You have successfully reset your password!';
                $_SESSION['message'] = $message;
                //NOTE: If account is found update the password to a default password
                $default_password = 'village88';
                $new_hashed_password = password_hash($default_password, PASSWORD_DEFAULT);
                $update_query = "UPDATE auth1_users SET hashed_password = ? WHERE $phone_number = ?";
                $update_statement = $connection -> prepare($update_query);
                $update_statement -> bind_param('ss', $new_hashed_password, $result_phone_number);
                $update_statement -> execute();

                if ($update_statement->affected_rows > 0) {
                    $message = 'Reset password successfully!!';
                    $_SESSION['message'] = $message;
                } else {
                    $message = 'Error resetting password';
                    $_SESSION['message'] = $message;
                }
                $update_statement -> close();
                header('Location: reset_password.php');
                exit();
            } else {
                $message = 'Account not found!!';
                $_SESSION['message'] = $message;
                header('Location: reset_password.php');
            }
        }
    }
} else {
    header('Location: index.php');
    exit();
}
