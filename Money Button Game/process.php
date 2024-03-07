<?php
$_SESSION["money"] = $_POST["money"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["action"] == "low_risk") {
        $_SESSION["money"] = $_SESSION["money"] + 10;
    }
}
// header("Location: index.php");
// exit();
