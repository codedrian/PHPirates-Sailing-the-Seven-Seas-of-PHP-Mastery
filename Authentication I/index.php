<?php
session_start();

if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
    // header('refresh: 2');
} else {
    $errors = [];
}
if (isset($_SESSION['messages'])) {
    $messages = $_SESSION['messages'];
    unset($_SESSION['messages']);
    // header('refresh: 2');
} else {
    $messages = [];
}

if (isset($_POST['forgot_password'])) {
    // Redirect the user to the password reset page
    header('Location: reset_password.php');
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
        <div class="error-message-container">
            <?php
            if (!empty($errors)) :
                foreach ($errors as $error) :
            ?>
                    <p><?= $error ?></p>
            <?php
                endforeach;
            endif;
            ?>
            <?php
            if (!empty($messages)) :
                foreach ($messages as $message) :
            ?>
                    <p><?= $message ?></p>
            <?php
                endforeach;
            endif;
            ?>
        </div>
        <header>
            <h1>Register</h1>
        </header>
        <form action="process.php" method="post" class="registration-form">
            <input type="hidden" name="action" value="submit_registration">
            <label for="first_name">First name:</label>
            <input type="text" name="first_name" placeholder="John">
            <label for="last_name">Last name:</label>
            <input type="text" name="last_name" placeholder="Doe">
            <label for="phone_number">Phone number:</label>
            <input type="text" name="phone_number" placeholder="09313131313">
            <label for="password">Password:</label>
            <input type="text" name="password">
            <label for="confirm_password">Confirm password:</label>
            <input type="text" name="confirm_password">
            <input type="submit">
        </form>
        <header>
            <h1>Log in</h1>
        </header>
        <form action="process.php" method="post" class="login-form">
            <input type="hidden" name="action" value="submit_login">
            <label for="phone_number">Phone number</label>
            <input type="text" name="phone_number">
            <label for="password">Password:</label>
            <input type="text" name="password">
            <input type="submit">
        </form>

        <form action="reset_password.php" method="post" class="password_reset_button">
            <input type="hidden" name="action" value="reset_password">
            <input type="submit" value="Reset password?">
        </form>
    </main>
</body>

</html>
