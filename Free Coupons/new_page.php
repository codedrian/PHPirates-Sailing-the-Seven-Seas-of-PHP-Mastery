<?php
session_start();
if (!isset($_SESSION["discount_code"])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <main>
        <header>
            <h1>Welcome customer to this page! 🚀 </h1>
        </header>
        <form action="process.php" method="post">
            <p>We're giving away <span>free coupons</span> as a token of appreciation<p>
            <p><?=$_SESSION["discount_code"]?></p>
            <input type="hidden" name="action" value="claim_again">
            <button><a href="index.php">Claim again</a></button>
        </form>
    </main>
</body>
</html>
