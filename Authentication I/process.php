<?php

if ($_SERVER['REQUEST_METHOD'] && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];

    if (isset($_POST['action']) && $_POST['action'] == 'submit_registration') {
        //Name validations and sanitation
        if (strlen($_POST['first_name']) > 0) {
            $first_name = isset($_POST['first_name']) ? filter_var($_POST['first_name'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
        } else {
            $errors[] = "First name is required!";
        }

        if (strlen($_POST['first_name']) > 0) {
            $last_name = isset($_POST['last_name']) ? filter_var($_POST['last_name'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
        } else {
            $errors[] = "Last name is required!";
        }

        if (strlen($_POST['phone_number']) > 0) {
            $phone_number = isset($_POST['phone_number']) ? filter_var($_POST['phone_number'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
        } else {
            $errors[] = "Phone number is required!";
        }

        if (strlen($_POST['password']) > 0) {
            $password = isset($_POST['password']) ? filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
        } else {
            $errors[] = "Password is required!";
        }

        if (strlen($_POST['confirm_password']) > 0) {
            $confirm_password = isset($_POST['confirm_password']) ? filter_var($_POST['confirm_password'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
        } else {
            $errors[] = "Please confirm your password!";
        }

        if ((strlen($_POST['confirm_password']) > 0) && ($_POST['confirm_password'] !== $_POST['password'])) {
            $errors = "Password don't match!";
        }

        var_dump($errors);
    }

}
