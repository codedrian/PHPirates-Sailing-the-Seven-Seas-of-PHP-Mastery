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
        if (strlen($first_name) == 0) {
            $errors[] = "First name cannot be empty";
        } else {
            $_SESSION["first_name"] = $first_name;
        }
    $last_name = (isset($_POST["last_name"])) ? htmlspecialchars($_POST["last_name"]) : "";
        if (strlen($last_name) == 0) {
            $errors[] = "Last name cannot be empty";
        }
        else {
            $_SESSION["last_name"] = $last_name;
        }
    $email = (isset($_POST["email"])) ? htmlspecialchars($_POST["email"]) : "";
        if(strlen($email) == 0) {
            $errors[] = "Email cannot be empty";
        }
        else {
            $_SESSION["email"] = $email;
        }
    $issue_title = (isset($_POST["issue_title"])) ? htmlspecialchars($_POST["issue_title"]) : "";
        if(strlen($issue_title) == 0) {
            $errors[] = "Issue Title cannot be empty";
        }
        else {
            $_SESSION["issue_title"] = $issue_title;
        }
    $issue_details = (isset($_POST["issue_details"])) ? htmlspecialchars($_POST["issue_details"]) : "";
        if(strlen($issue_details) == 0) {
            $errors[] = "Issue details cannot be empty";
        }
        else {
            $_SESSION["issue_details"] = $issue_details;
        }


    if (!empty($errors)) {
        $_SESSION["errors"] = $errors;

        header("Location: index.php");
        exit();
    }
    else {
        header("Location: index.php");
        exit();
    }
}
