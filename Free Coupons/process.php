<?php
session_start();
if (!isset($_SESSION["remaining_coupons"])) {
    $_SESSION["remaining_coupons"] = 10;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION["claimed_coupons"])) {
        $_SESSION["claimed_coupons"]++;
    }
    else {
        $_SESSION["claimed_coupons"] = 1;
    }

    $_SESSION["remaining_coupons"] = 10 - $_SESSION["claimed_coupons"];
}

if (isset($_POST["action"]) && $_POST["action"] == "reset") {
    $_SESSION["remaining_coupons"] = 10;
}



header("Location: index.php");
exit();
?>
