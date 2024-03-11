<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    $date = (isset($_POST["date"])) ? htmlspecialchars($_POST["date"]) : "";
    if (strlen($date) == 0) {
        $errors[] = "Date cannot be empty";
    } else {
        $_SESSION["date"] = $date;
    }
    $first_name = (isset($_POST["first_name"])) ? htmlspecialchars($_POST["first_name"]) : "";
    for ($char = 0; $char < strlen($first_name); $char++) {
        if (ctype_digit($first_name[$char])) {
            $errors[] = "Invalid First name. It shouldn't contain numbers.";
            break;
        }
    }
    if (strlen($first_name) == 0 || ctype_space($first_name)) {
        $errors[] = "First name cannot be empty";
    } else {
        $_SESSION["first_name"] = $first_name;
    }
    $last_name = (isset($_POST["last_name"])) ? htmlspecialchars($_POST["last_name"]) : "";
    for ($char = 0; $char < strlen($last_name); $char++) {
        if (ctype_digit($last_name[$char])) {
            $errors[] = "Invalid Last name. It shouldn't contain numbers.";
            break;
        }
    }
    if (strlen($last_name) == 0 || ctype_space($last_name)) {
        $errors[] = "Last name cannot be empty";
    } else {
        $_SESSION["last_name"] = $last_name;
    }
    $email = (isset($_POST["email"])) ? htmlspecialchars($_POST["email"]) : "";
    $sanitized_email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (filter_var($sanitized_email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["email"] = $email;
    } else if (strlen($email) == 0) {
        $errors[] = "Email cannot be empty";
    } else {
        $errors[] = "Invalid email address";
    }
    $issue_title = (isset($_POST["issue_title"])) ? htmlspecialchars($_POST["issue_title"]) : "";
    $errors[] = (strlen($issue_title > 50)) ? "Issue Title must be at least 50 characters" : "";
    if (strlen($issue_title) == 0 || ctype_space($issue_title)) {
        $errors[] = "Issue Title cannot be empty";
    } else {
        $_SESSION["issue_title"] = $issue_title;
    }

    $issue_details = (isset($_POST["issue_details"])) ? htmlspecialchars($_POST["issue_details"]) : "";
    $errors[] = (strlen($issue_details) > 250) ? "Issue Details cannot exceed 250 characters" : "";
    if (strlen($issue_details) == 0 || ctype_space($issue_details)) {
        $errors[] = "Issue details cannot be empty";
    } else {
        $_SESSION["issue_details"] = $issue_details;
    }


    if (!empty($errors)) {
        $_SESSION["errors"] = $errors;

        header("Location: index.php");
        exit();
    } else {
        header("Location: index.php");
        exit();
    }
}
