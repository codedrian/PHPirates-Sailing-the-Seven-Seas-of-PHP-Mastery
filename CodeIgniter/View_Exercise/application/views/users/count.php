<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit Count</title>
</head>

<body>
    <h1>You visited this page <?= $visitCount ?> time/s</h1>
    <p>Kindly refresh the page or copy the URL and paste it to your browser.</p>
    <button><?= anchor('users/reset', 'Reset'); ?></button>
</body>

</html>
