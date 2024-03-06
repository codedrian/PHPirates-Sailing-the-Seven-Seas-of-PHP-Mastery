<?php
session_start();

if (!isset($_SESSION["remaining_coupons"])) {
    $_SESSION["remaining_coupons"] = 10;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Free Coupons</title>
</head>

<body>
    <main>
        <header>
            <h1>Welcome customer! 🚀 </h1>
            <p><?= $_SESSION["remaining_coupons"]?></p>
        </header>

            <?php
            if ((isset($_SESSION["remaining_coupons"])) && $_SESSION["remaining_coupons"] > 0) {
            ?>
            <p>We're giving away <span>free coupons</span>
        <p>as a token of appreciation for the first <?= $_SESSION["remaining_coupons"] ?> customer(s).</p>
        <form action="process.php" method="post">
            <label for="name">Kindly type your name:</label>
            <input type="text" name="submit">
            <input type="submit">
        </form>
    <?php
            }
    ?>

    <?php
    if (isset($_SESSION["remaining_coupons"]) && $_SESSION["remaining_coupons"] == 0) {
    ?>
        <div>
            <header>
                <h1>Sorry! </h1>
            </header>
            <p>You're ran out of voucher</p>
            <form action="process.php" method="post">
                <input type="hidden" name="action" value="reset">
                <input type="submit">
            </form>

        </div>
    <?php
    }
    ?>


    </main>
</body>

</html>
