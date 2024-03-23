<?php
session_start();
if (isset($_SESSION["errors"])) {
    $errors = $_SESSION["errors"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 30%;
            margin-inline: auto;
        }
    </style>
</head>
<body>
    <?php
    if (!empty($errors)) :
        foreach ($errors as $error) :
    ?>
    <p><?= $error?></p>
    <?php
        endforeach;
    endif;
    ?>
    <form action="process.php" method="post">
        <input type="hidden" name="action" value="submit_sign_in">
        <label for="first_name">First name:</label>
        <input type="text" name="first_name">
        <label for="last_name">Last name:</label>
        <input type="text" name="last_name">
        <label for="password">Password:</label>
        <input type="text" name="password">
        <input type="submit">
    </form>
</body>
</html>
