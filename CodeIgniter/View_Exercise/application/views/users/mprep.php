<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>User name: <?= $name ?></h1>
    <h2>Age: <?= $age ?> Location: <?= $location ?></h2>
    <h3>Hobbies: <?= count($hobbies)?></h3>
    <ol>
        <?php foreach ($hobbies as $hobby): ?>
            <li><?= $hobby?></li>
        <?php endforeach; ?>
    </ol>
</body>
</html>
