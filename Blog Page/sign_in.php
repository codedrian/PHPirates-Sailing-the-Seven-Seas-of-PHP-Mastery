<?php
session_start();
$errors = [];

if (isset($_SESSION["errors"])) {
    $errors = $_SESSION["errors"];
}
unset($_SESSION["errors"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forms.css">
    <title>Blog | Register</title>
</head>

<body>
    <main>
        <form action="process.php" method="post" class="anonymous">
            <input type="hidden" name="action" value="submit_anonymous_user">
            <input type="submit" value="Visit site anonymously?">
        </form>
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
        <form action="process.php" method="post">
            <p class="title">Register </p>
            <p class="message">Signup now and get full access to our app. </p>
            <div class="flex">
                <input type="hidden" name="action" value="submit_registration">
                <label for="first_name">
                    <input  placeholder="" type="text" class="input" name="first_name">
                    <span>First name</span>
                </label>

                <label for="last_name">
                    <input ="" placeholder="" type="text" class="input" name="last_name">
                    <span>Last name</span>
                </label>
            </div>

            <label for="email">
                <input  placeholder="" type="email" class="input" name="email">
                <span>Email</span>
            </label>

            <label for="password">
                <input  placeholder="" type="password" class="input" name="password">
                <span>Password</span>
            </label>
            <label for="confirm_password">
                <input placeholder="" type="password" class="input" name="confirm_password">
                <span>Confirm password</span>
            </label>
            <input type="submit" class="submit">
            <p class="signin">Already have an account ? <a href="log_in.php">Sign in</a></p>

        </form>
    </main>
</body>

</html>
