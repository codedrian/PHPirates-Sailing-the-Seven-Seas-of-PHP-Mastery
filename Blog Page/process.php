<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"]) && $_POST["action"] == "submit_registration") {
        //NOTE: Sanitation and validation for firstname and lastname
        if (strlen($_POST["first_name"]) == 0) {
            $errors[] = "First name is required!";
        } else if (preg_match("/\d/", $_POST["first_name"])) {
            $errors[] = "First name must not contain number!";
        } else {
            $sanitized_first_name = (isset($_POST["first_name"])) ? filter_var($_POST["first_name"], FILTER_SANITIZE_SPECIAL_CHARS) : "";
        }
        if (strlen($_POST["last_name"]) == 0) {
            $errors[] = "Last name is required!";
        } else {
            $sanitized_last_name = (isset($_POST["last_name"])) ? filter_var($_POST["last_name"], FILTER_SANITIZE_SPECIAL_CHARS) : "";
            if (preg_match("/\d/", $_POST["last_name"])) {
                $errors[] = "Last name must not contain number!";
            }
        }
        //NOTE: Validate and sanitize email
        if (strlen($_POST["email"]) == 0) {
            $errors[] = "Pease enter your email!";
        } else {
            $sanitized_email = (isset($_POST["email"])) ? filter_var($_POST["email"], FILTER_SANITIZE_EMAIL) : "";
            if (!filter_var($sanitized_email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "{$sanitized_email} is not a valid email address";
            }
        }

        //NOTE: Validate and sanitize password
        //NOTE: Validate confirm password
        if (strlen($_POST["password"]) == 0) {
            $errors[] = "Please enter your password";
        } else {
            $sanitized_password = (isset($_POST["password"])) ? filter_var($_POST["password"], FILTER_SANITIZE_SPECIAL_CHARS) : "";
            if (empty($_POST["confirm_password"])) {
                $errors[] = "Please confirm your password";
            } else if ($_POST["password"] !== $_POST["confirm_password"]) {
                $errors[] = "Password don't match!";
            }
        }

        if (!empty($errors)) {
            $_SESSION["errors"] = $errors;
            header("Location: sign_in.php");
            exit();
        }
    }
}
