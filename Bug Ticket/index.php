<?php
session_start();

$date = $first_name = $last_name = $email = $issue_title = $issue_details = "";

if (isset($_SESSION["errors"]) &&  is_array($_SESSION["errors"])) {
    $errors = $_SESSION["errors"];
} else {
    $errors = array();
}
unset($_SESSION["errors"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bug Ticket</title>
</head>

<body>
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
    <main>
        <div class="form-container">
            <form action="process.php" method="post">
                <label for="date">Date:</label>
                <input type="date" name="date">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name">
                <label for="email">Email</label>
                <input type="text" name="email">
                <label for="issue_title">Issue Title</label>
                <input type="text" name="issue_title">
                <label for="issue_details">Issue Details:</label>
                <textarea name="issue_details" cols="33" rows="10"></textarea>
                <input type="submit">
            </form>
        </div>
    </main>
</body>
</html>
