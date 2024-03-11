<?php
session_start();
if (!isset($_SESSION["remaining_coupons"])) {
    $_SESSION["remaining_coupons"] = 10;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"]) && $_POST["action"] == "reset") {
    unset($_SESSION["remaining_coupons"]);
    unset($_SESSION["claimed_coupons"]);
    header("Location: index.php");
    exit();
    }
    else if  ($_POST["action"] == "claim_again") {
        unset($_SESSION["discount_code"]);
    }
    else {
        if (isset($_SESSION["claimed_coupons"])) {
            $_SESSION["claimed_coupons"]++;
        }
        else {
            $_SESSION["claimed_coupons"] = 1;
        }
        $_SESSION["remaining_coupons"] = 10 - $_SESSION["claimed_coupons"];

        $discount_code = substr(md5(mt_rand()), 0, 9);
        $_SESSION["discount_code"] = $discount_code;

        header("Location: new_page.php");
        exit();
    }
}
header("Location: index.php");
exit();
?>
