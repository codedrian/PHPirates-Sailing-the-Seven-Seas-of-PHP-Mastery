<?php
session_start();

if (isset($_SESSION["errors"])) {
    $errors = $_SESSION["errors"];
}
if (isset($_SESSION["message"])) {
    $message = $_SESSION["message"];
}
unset($_SESSION["errors"]);
unset($_SESSION["message"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forms.css">
    <title>Blog | Login</title>
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
            <?php
            if (!empty($message)) :
                foreach ($message as $result) :
            ?>
                    <li><?= $result ?></li>
            <?php
                endforeach;
            endif;
            ?>
        </ul>
        <form action="process.php" method="post">
            <p class="title">Login</p>
            <input type="hidden" name="action" value="submit_login">
            <label for="email">
                <input placeholder="" type="email" class="input" name="email">
                <span>Email</span>
            </label>

            <label for="password">
                <input placeholder="" type="password" class="input" name="password">
                <span>Password</span>
            </label>
            <input type="submit" class="submit">
        </form>
    </main>
</body>

</html>
