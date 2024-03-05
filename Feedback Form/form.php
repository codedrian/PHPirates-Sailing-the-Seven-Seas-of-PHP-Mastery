<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Feedback Form</title>
</head>
<body>
    <form action="process.php" method="POST">
        <label for="full_name">Name: (Optional)</label>
        <input type="text" name="full_name">
        <label for="course">Course Title: </label>
        <select name="course" id="course">
            <option value="web_fundamentals">Web Fundamentals</option>
            <option value="php">Web Development with PHP</option>
            <option value="javascript">Web Development with Javascript</option>
        </select>
        <label for="score">Score:</label>
        <select name="score" id="score">
            <?php for ($option = 0; $option <= 10; $option++) { ?>
                <option value="<?= $option?>"><?= $option ?></option>
            <?php }?>
        </select>
        <label for="reason">Reason:</label>
        <textarea name="reason" id="reason" cols="30" rows="10"></textarea>
        <input type="submit">
    </form>
</body>
</html>
