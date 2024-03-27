<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New user</title>

</head>

<body>
    <header>
        <h1>Add a new user</h1>
    </header>
    <?php echo validation_errors(); ?>
    <!-- NOTE: is equals to http://localhost/View_Exercise/index.php/users/new -->
    <?php echo form_open('users/create'); ?>
        <label for="first_name">First Name:</label>
        <?php echo form_input('first_name'); ?>
        <label for="last_name">Last Name:</label>
        <?php echo form_input('last_name'); ?>
        <label for="password">Password:</label>
        <?php echo form_password('password'); ?>
        <?php echo form_submit('submit', 'Create user'); ?>
    <?php echo form_close(); ?>
</body>

</html>
