<?php
session_start();
require_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] && $_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    $date = (isset($_POST["date"])) ? htmlspecialchars($_POST["date"]) : "";
    if (strlen($date) == 0) {
        $errors[] = "Date cannot be empty";
    }
    else {
        $_SESSION["date"] = $date;
    }

    $contact_number = (isset($_POST["contact_number"])) ? htmlspecialchars($_POST["contact_number"]) : "";
    if (strlen($contact_number) == 0) {
        $errors[] = "Number cannot be empty";
    }
    else {
        $_SESSION["contact_number"] = $contact_number;
        echo "Contact Number from Session: " . $_SESSION["contact_number"];

    }


    $date = date('Y-m-d H:i:s', strtotime($date));
    $query = "INSERT INTO my_projects.raffle_entries(contact_number, submission_datetime) VALUES('{$_SESSION['contact_number']}', '$date')";

    if (run_mysql_query($query)) {
        $message = "Successfully Added";
    }
    else {
        $message = "Aww snap!";
        header("Location: index.php");
        exit();
    }

    if (!empty($errors)) {
        $_SESSION["errors"] = $errors;
        header("Location: index.php");
        exit();
    }
}
?>
