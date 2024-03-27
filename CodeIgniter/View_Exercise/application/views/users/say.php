<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Your message is <?= $message?></h1>
    <p>Add anything and add a number at the end.</p>
    <p>For example: users/say/helloworld/5</p>
    <ol>
    <?php
    for ($numberOfTimes = 0; $numberOfTimes < $number; $numberOfTimes++ ) :
    ?>
    <li><?= $message ?></li>
    <?php
    endfor
    ;?>
    </ol>
</body>
</html>
