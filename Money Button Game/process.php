<?php
session_start();

if (!isset($_SESSION["betArr"]) || !is_array($_SESSION["betArr"])) {
    $_SESSION["betArr"] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"]) && $_POST["action"] == "low_risk") {
        $_SESSION["bet_result"] =  mt_rand(-25, 100);
        $_SESSION["money"] += $_SESSION["bet_result"];
        $_SESSION["bet"] = "Low Risk";
    }
    else if (isset($_POST["action"]) && $_POST["action"] == "moderate_risk") {
        $_SESSION["bet_result"] = mt_rand(-100, 1000);
        $_SESSION["money"] += $_SESSION["bet_result"];
        $_SESSION["bet"] = "Moderate Risk";
    }
    else if (isset($_POST["action"]) && $_POST["action"] == "high_risk") {
        $_SESSION["bet_result"] = mt_rand(-500, 2500);
        $_SESSION["money"] += $_SESSION["bet_result"];
        $_SESSION["bet"] = "High Risk";
    }
    else if (isset($_POST["action"]) && $_POST["action"] == "severe_risk") {
        $_SESSION["bet_result"] = mt_rand(-3000, 5000);
        $_SESSION["money"] += $_SESSION["bet_result"];
        $_SESSION["bet"] = "Severe Risk";
    }
    date_default_timezone_set('Asia/Manila');
    $betTime = date("m-d-Y h:i:s");
    $randomNumber = $_SESSION["bet_result"]; // Store the random number in a variable
    array_push($_SESSION["betArr"], ["date" => $betTime, "bet" => $_SESSION["bet"], "bet_result" => $_SESSION["bet_result"], "money" => $_SESSION["money"]]); // Add the random number to the array
}
header("Location: index.php");
exit();
?>
