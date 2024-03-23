<?php
session_start();
require_once("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["errors"] = [];
    if (isset($_POST["action"]) && $_POST["action"] == "submit_sign_in") {
        require_once("./Class/sign_in.php");
        $first_name = (isset($_POST["first_name"])) ? $_POST["first_name"] : "";
        $last_name = (isset($_POST["last_name"])) ? $_POST["last_name"] : "";
        $password = (isset($_POST["password"])) ? $_POST["password"] : "";
        $user = new UserAuthenticator($first_name, $last_name, $password);
        if ($user->inputChecker()) {
            $user->sanitizeInput()->addToDatabase($connection);
            $_SESSION["errors"][] = "Successfully added";
        };
    }
header("Location: index.php");
exit();
}
