<?php
session_start();

if ($_SESSION["remaining_coupons"] > 1) {
    header("Location: index.php");
    exit();
}
?>
<DOCTYPE html>
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
            <h1>Welcome customer! 🚀 </h1>
        </header>
        <p>We're giving away <span>free coupons</span> as a token of appreciation<p>
        <p>Sorry! You're ran out of voucher</p>
        <form action="process.php" method="post">
            <input type="hidden" name="action" value="reset">
            <input type="submit" value="Reset">
        </form>

    </main>
</body>

</html>
