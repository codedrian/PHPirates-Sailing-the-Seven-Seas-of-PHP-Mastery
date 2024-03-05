
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
    <p>Name: <?= $_POST["full_name"]?></p>
    <p>Course Title: <?= $_POST["course"]?></p>
    <p>Given Score: <?= $_POST["score"]?></p>
    <p>Reason: <?= $_POST["reason"]?></p>
    <button><a href="./form.php">click me</a></button>
</body>
</html>
