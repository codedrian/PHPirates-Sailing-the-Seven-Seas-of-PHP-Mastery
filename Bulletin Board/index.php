<?php
require_once("new-connection.php");
session_start();

if (!isset($_SESSION["error"])) {
    $error = [];
}
else {
    $error = $_SESSION["error"];
}


unset($_SESSION["error"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bulletin Board</title>
</head>

<body>
    <header>
        <h1>Bulletin Board Entry</h1>
    </header>
    <?php
    if (isset($error)) :
        foreach ($error as $value) :
    ?>
    <p><?= $value ?></p>
    <?php
        endforeach;
    endif;
    ?>

    <main>
        <form action="process.php" method="post">
            <label for="announcement_subject">Subject</label>
            <input type="text" name="announcement_subject">
            <label for="announcement_details">Details</label>
            <textarea name="announcement_detail" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="Add">
            <input type="submit" value="Skip" formaction="main.php">
        </form>
    </main>
</body>

</html>
