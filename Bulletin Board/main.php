<?php
require_once("new-connection.php");
$query = "SELECT * FROM my_projects.bulletin_board";
$result = fetch_all($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bulletin Board View</title>
</head>

<body>
    <header>
        <h1>Bulletin Board View</h1>
    </header>

    <main>
        <?php
        if (!empty($result)) :
            foreach ($result as $row) :
        ?>
            <div class="bulletin-card">
                <h3><?= $row["announcement_subject"] ?></h3>
                <p><?= $row["announcement_detail"] ?></p>
            </div>
        <?php
            endforeach;
            ?>
        <?php
        else :
        ?>
            <div class="bulletin-card">
                <h3>Empty</h3>
            </div>
        <?php
        endif;
        ?>
        <button><a href="index.php">Back</a></button>
    </main>
</body>

</html>
