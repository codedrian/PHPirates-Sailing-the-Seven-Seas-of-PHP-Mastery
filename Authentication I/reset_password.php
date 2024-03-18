<?php
session_start();

// if ($_SERVER['REQUEST_METHOD'] == 'POST' &&  isset($_POST['action']) && $_POST['action'] == 'reset_password') {
// } else {
//     header('Location: index.php');
//     exit();
// }

if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
}
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
}
unset($_SESSION['error']);
unset($_SESSION['message']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login System</title>
</head>

<body>
    <main>
        <header>
            <h1>Reset</h1>
        </header>
        <div class="error-message-container">
            <?php
            if (!empty($error)) :
            ?>
                <p><?= $error ?></p>
            <?php
            endif;
            ?>
            <?php
            if (!empty($message)) :
            ?>
                <p><?= $message ?></p>
            <?php
            endif;
            ?>
        </div>
        <form action="process.php" method="post" class="reset_password_form">
            <input type="hidden" name="action" value="reset_password_form">
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number">
            <input type="submit">
        </form>
        <button><a href="index.php">Back</a></button>
    </main>
</body>

</html>
