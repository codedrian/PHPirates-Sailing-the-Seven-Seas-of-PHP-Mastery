<?php
session_start();
require_once("connection.php");
if ($_SESSION["is_logged_in"]) {
    $id = $_SESSION["id"];
    $first_name = $_SESSION["first_name"];
    $last_name = $_SESSION["last_name"];
}

$errors = [];
if (isset($_SESSION["errors"])) {
    $errors = $_SESSION["errors"];
}
unset($_SESSION["errors"]);
if (isset($_SESSION["results"])) {
    $results = $_SESSION["results"];
}

$results = (isset($_SESSION["results"])) ? $_SESSION["results"] : [];

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
        <?php
        if ($_SESSION["is_logged_in"]) :
        ?>
            <nav>
                <h3>Welcome, <?= $first_name . $id ?></h3>
                <form action="process.php" method="post">
                    <input type="hidden" name="action" value="logout">
                    <input type="submit" value="Sign out">
                </form>
            </nav>
        <?php
        endif;
        ?>

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
        <?php
        if (isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"]) :
        ?>
            <form action="process.php" method="post">
                <input type="hidden" name="action" value="submit_review">
                <label for="review">Leave review</label>
                <textarea name="review" id="" cols="30" rows="10"></textarea>
                <input type="submit" value="Post a review">
            </form>
        <?php
        endif;
        ?>
<section class="user_reviews_section">
    <?php if (!empty($results)) : ?>
        <?php foreach ($results as $user_review) : ?>
            <div class="user_reviews">
        
                <p class="user_name"><?= $user_review["reviewer_name"] ?></p>
                <p><?= date('Y-m-d g:i:s A', strtotime($user_review["review_created_at"])) ?></p>
                <p class="user_review_content"><?= $user_review["review_content"] ?></p>

                <!-- Display replies if any -->
                <?php if ($user_review["reply_content"]) : ?>
                    <div class="replies">
                        <p>Replies:</p>
                        <?php
                            $reply_content_array = explode(',', $user_review["reply_content"]);
                            $reply_created_at_array = explode(',', $user_review["reply_created_at"]);
                            foreach ($reply_content_array as $index => $reply_content) :
                        ?>
                            <p><?= $reply_content ?> - <?= date('Y-m-d g:i:s A', strtotime($reply_created_at_array[$index])) ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if ($_SESSION["is_logged_in"] == TRUE) : ?>
                    <form action="process.php" method="post" class="user_reply">
                        <input type="hidden" name="action" value="user_reply">
                        <input type="hidden" name="review_id" value="<?= $user_review["review_id"] ?>">
                        <label for="userReplyContent">Leave a reply</label>
                        <input type="text" name="userReplyContent">
                        <input type="submit">
                    </form>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</section>




    </main>
</body>

</html>
