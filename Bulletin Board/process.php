<?php
session_start();
require_once("new-connection.php");
if ($_SERVER["REQUEST_METHOD"] && $_SERVER["REQUEST_METHOD"] == "POST" ) {
    $error = [];
    $announcement_subject = (isset($_POST["announcement_subject"])) ? filter_var($_POST["announcement_subject"], FILTER_SANITIZE_SPECIAL_CHARS) : "";
    if (strlen($announcement_subject) == 0) {
        $error[] = "Announcement subject is required!";
    }
    else {
        $_SESSION[$announcement_subject] = $announcement_subject;
    }

    $announcement_detail = (isset($_POST["announcement_detail"])) ? filter_var($_POST["announcement_detail"], FILTER_SANITIZE_SPECIAL_CHARS) : "";
    if (strlen($announcement_detail) == 0) {
        $error[] = "Announcement detail is required!";
    }
    else {
        $_SESSION[$announcement_detail] = $announcement_detail;
    }

}

if (!empty($error)) {
    $_SESSION["error"] = $error;
    header("Location: index.php");
    exit();
}
else {
    $query = "INSERT INTO bulletin_board(announcement_subject, announcement_detail, created_at) VALUES(?, ?, NOW())";

    $statement = $connection->prepare($query);
    $statement -> bind_param('ss', $announcement_subject, $announcement_detail);
    $statement -> execute();
    $statement -> close();

    header("Location: main.php");
    exit();
}
