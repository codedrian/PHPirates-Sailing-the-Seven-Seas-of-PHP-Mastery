<?php

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
        <form action="process.php" method="post" class="login-form">
            <input type="hidden" name="action" value="submit_login">
            <label for="phone_number">Phone number</label>
            <input type="text" name="phone_number">
            <label for="password">Password:</label>
            <input type="text" name="password">
            <input type="submit">
        </form>
    </main>
</body>

</html>
