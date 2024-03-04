<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <?php
    for ($i = 0; $i < 5; $i++) :
    ?>
        <?php
        $ticketName = "Adrian Gaile Singh";
        $ticketNumber = md5(mt_rand());
        ?>
        <img src="ticket.php?name=<?php echo urlencode($ticketName); ?>&number=<?php echo urlencode($ticketNumber); ?>">
    <?php
    endfor;
    ?>
</body>

</html>
