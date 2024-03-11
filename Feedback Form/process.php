<?php
// using ?? Nullish coalescing operator  to check if $_POST["full_name"] is set.
$full_name = $_POST["full_name"] ?? null;
$score = $_POST["score"] ?? null;
$course = $_POST["course"] ?? null;
$reason = $_POST["reason"] ?? null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form </title>
</head>

<body>
    <header>
        <h1>Submitted Entry</h1>
    </header>
    <p>Name: <?= $full_name ?> </p>
    <p>Course Title: <?= $course ?></p>
    <p>Given Score: <?= $score ?></p>
    <p>Reason: <?= $reason ?></p>
    <button><a href="./form.php">click me</a></button>
</body>

</html>
