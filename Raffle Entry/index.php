<?php
session_start();

if (isset($_SESSION["errors"]) && is_array($_SESSION["errors"])) {
    $errors = $_SESSION["errors"];
}
else {
    $errors = [];
}
unset($_SESSION["errors"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Raffle Entry</title>
</head>
<body>
<main>

    <ul>
        <?php
        if (!empty($errors)) :
            foreach ($errors as $error) :
        ?>
        <li><?= $error ?></li>
        <?php
        endforeach;
        endif;
        ?>
    </ul>
    <table>
        <tr>
            <th>Contact number</th>
            <th>Date</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>

    <form action="process.php" method="post">
        <label for="contact_number">Contact Number:</label>
        <input type="text" name="contact_number">
        <label for="date">Date</label>
        <input type="date" name="date" min="<?php echo date('Y-m-d'); ?>">
        <input type="submit">

    </form>
</main>
</body>
</html>
