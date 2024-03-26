<?php
session_start();
if ((!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== TRUE)) {
    header('Location: index.php');
    exit();
}
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <header>
        <h1>WELCOME</h1>
    </header>
    <form method="post">
        <input type="submit" name="logout" value="logout">
    </form>
</body>

</html>
