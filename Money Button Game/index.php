<?php
session_start();
$money = 500;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Button Game</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Your money: <?= $money ?></h1>

<div class="form-container">
    <form action="process.php" class="form-group">
        <input type="hidden" name="action" value="low_risk">
        <label for="low_risk">Low Risk</label>
        <input type="submit" value="Bet">
        <p>by -25 to 100</p>
    </form>
    <form action="process.php" method="post" class="form-group">
        <input type="hidden" name="moderate_risk" value="moderate_risk">
        <label for="moderate_risk">Moderate Risk</label>
        <input type="submit" value="Bet">
        <p>by -100 up tp 1000</p>
    </form>
    <form action="process.php" method="post" class="form-group">
        <label for="high_risk">High Risk</label>
    <input type="hidden" name="action" value="high_risk">
    <input type="submit" value="Bet">
    <p>by -500 up tp 2500</p>
    </form>
    <form action="process.php" method="post" class="form-group">
        <label for="severe_risk">Severe Risk</label>
        <input type="hidden" name="action" value="severe_risk">
        <input type="submit" value="Bet">
        <p>by -3000 to 5000</p>
    </form>
</div>
</body>
</html>
