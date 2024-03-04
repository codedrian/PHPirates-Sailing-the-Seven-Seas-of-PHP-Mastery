<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       table {
    border-collapse: collapse;
}
table th,
table td {
    border: 1px solid black;
    width: 10rem;
    text-align: center;
}
.highlighted {
    background-color: #d3d3d3;
}

    </style>
</head>

<body>
    <table>
        <?php
        ini_set('auto_detect_line_endings', TRUE);
        if (($handle = fopen("us-500.csv", "r")) !== FALSE) {
            // Skip the first row (header) of the CSV file
            fgetcsv($handle, 1000, ",");
            $row = 1;
            $highlighted = '';
        ?>
        <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Company Name</th>
                <th>Full Address</th>
                <th>Phone 1</th>
                <th>Phone 2</th>
                <th>Email Address</th>
                <th>Website</th>
            </tr>
        <?php
            while (($rowData = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // Check if the current row index is a multiple of 10
                if ($row % 10 == 0 ) {
                    $highlighted = "highlighted";
                } else {
                    $highlighted = "";
                }
        ?>

                <tr class="<?= $highlighted ?>">
                    <td><?= $rowData[0] ?></td>
                    <td><?= $rowData[1] ?></td>
                    <td><?= $rowData[2] ?></td>
                    <td><?= $rowData[3] . $rowData[4] . $rowData[5] . $rowData[6] ?></td>
                    <td><?= $rowData[8] ?></td>
                    <td><?= $rowData[9] ?></td>
                    <td><?= $rowData[10] ?></td>
                    <td><?= $rowData[11] ?></td>
                </tr>
        <?php
                $row++;
            }
            fclose($handle);
        }
        ?>
    </table>
</body>

</html>
