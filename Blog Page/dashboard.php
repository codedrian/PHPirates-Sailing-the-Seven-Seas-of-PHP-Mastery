<?php
session_start();
require_once("connection.php");
if (isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"]) {
    $id = $_SESSION["id"];
    $first_name = $_SESSION["first_name"];
    $last_name = $_SESSION["last_name"];
} else {
    header("Location: sign_in.php");
}
$errors = [];
if (isset($_SESSION["errors"])) {
    $errors = $_SESSION["errors"];
}
unset($_SESSION["errors"]);

//NOTE: to retreive reviews
$query = "SELECT users.first_name, reviews.content, reviews.created_at FROM users
                INNER JOIN reviews ON users.id = reviews.user_id
                ORDER BY reviews.created_at DESC;";
$results = fetch_all($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <title>Blog | Dashboard</title>
</head>

<body>
    <header>
        <h1>Blog</h1>
        <nav>
            <h3>Welcome, <?= $first_name . $id ?></h3>
            <form action="process.php" method="post">
                <input type="hidden" name="action" value="logout">
                <input type="submit" value="Sign out">
            </form>
        </nav>
    </header>
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
        </ul>
        <section>
            <h3>Title</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae suscipit aut dicta cum sequi, sunt accusamus provident, maxime maiores blanditiis inventore perspiciatis odit dolor, alias praesentium minima doloribus eligendi corporis.
                Itaque fugiat quaerat quis aliquid laborum cupiditate eaque maiores velit vero optio suscipit eius voluptatibus adipisci at, alias esse officia veniam aperiam ullam harum doloribus nemo? Dicta, a iste. Aliquam.
                Corporis natus tenetur deserunt ex alias cum fugiat provident! Omnis animi explicabo similique modi eum dolores exercitationem incidunt! Ab eum pariatur fugiat impedit quas vitae voluptas voluptatem, fuga incidunt! Nemo.
                Cupiditate blanditiis, dicta rerum iure autem, non ut aperiam ipsa natus adipisci quasi sint a? Pariatur, ab officia, officiis ratione harum delectus velit odit in dicta reprehenderit dolor commodi quasi!</p>
        </section>
        <form action="process.php" method="post">
            <input type="hidden" name="action" value="submit_review">
            <label for="review">Leave review</label>
            <textarea name="review" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="Post a review">
        </form>
        <section class="user_reviews_section">
            <?php
            if (!empty($results)) :
                foreach ($results as $user_review) :
            ?>
                    <div class="user_reviews">
                        <p class="user"><?= $user_review["first_name"] . " " . date('Y-m-d g:i:s A', strtotime($user_review["created_at"])) ?></p>
                        <p class="user_review_content"><?= $user_review["content"] ?></p>
                    </div>
            <?php
                endforeach;
            endif;
            ?>
        </section>
    </main>
</body>

</html>
