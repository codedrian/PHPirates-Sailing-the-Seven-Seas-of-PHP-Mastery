<?php
session_start();
require_once("connection.php");

if (isset($_SESSION["errors"]) && is_array($_SESSION["errors"])) {
    $errors = $_SESSION["errors"];
} else {
    $errors = [];
}
unset($_SESSION["errors"]);

if (isset($_SESSION["message"]) && is_array($_SESSION["message"])) {
    $message = $_SESSION["message"];
} else {
    $message = [];
}
unset($_SESSION["message"]);
//NOTE: Fetch data from database
$query = "SELECT contact_number, submission_datetime FROM my_projects.raffle_entries";
$result = fetch_all($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Raffle Entry</title>
</head>

<body>
    <main>

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

            <?php
            if (!empty($message)) :
                foreach ($message as $messages) :
            ?>
                    <li><?= $messages ?></li>
            <?php
                endforeach;
            endif;
            ?>
        </ul>

        <table>
            <tr>
                <th>Contact number</th>
                <th>Date</th>
            </tr>
            <?php
            if (empty($result)) :
            ?>
            <tr>
                <td colspan="2">No data available</td>
            </tr>
            <?php
            endif;
            ?>
            <?php
            foreach ($result as $row) :
            ?>
                <tr>
                    <td><?= $row["contact_number"] ?></td>
                    <td><?= $row["submission_datetime"] ?></td>
                </tr>
            <?php
            endforeach;
            ?>
        </table>

        <form action="process.php" method="post">
            <label for="contact_number">Contact Number:</label>
            <input type="text" name="contact_number">
            <label for="date">Date</label>
            <input type="date" name="date" min="<?php echo date('Y-m-d'); ?>">
            <input type="submit">

        </form>
    </main>
</body>

</html>
