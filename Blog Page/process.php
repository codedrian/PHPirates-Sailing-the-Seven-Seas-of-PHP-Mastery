<?php
session_start();
require_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     //NOTE: This function processes the fetching of replies
    function fetchReviewsAndReply()
    {
        $query = "SELECT
                            CONCAT(users.first_name, ' ', users.last_name) AS reviewer_name,
                            reviews.id AS review_id,
                            reviews.content AS review_content,
                            reviews.created_at AS review_created_at,
                            GROUP_CONCAT(replies.content) AS reply_content,
                            GROUP_CONCAT(replies.created_at) AS reply_created_at
                        FROM
                            users
                        INNER JOIN reviews ON users.id = reviews.user_id
                        LEFT JOIN replies ON reviews.id = replies.review_id
                        GROUP BY
                            reviews.id
                        ORDER BY
                            reviews.created_at DESC, replies.created_at ASC";
        return fetch_all($query);
    }
    //NOTE: This code processes the registration submission
    if (isset($_POST["action"]) && $_POST["action"] == "submit_registration") {
        //NOTE: Sanitation and validation for firstname and lastname
        if (strlen($_POST["first_name"]) == 0) {
            $errors[] = "First name is required!";
        } else if (preg_match("/\d/", $_POST["first_name"])) {
            $errors[] = "First name must not contain number!";
        } else {
            $sanitized_first_name = (isset($_POST["first_name"])) ? filter_var($_POST["first_name"], FILTER_SANITIZE_SPECIAL_CHARS) : "";
        }
        if (strlen($_POST["last_name"]) == 0) {
            $errors[] = "Last name is required!";
        } else {
            $sanitized_last_name = (isset($_POST["last_name"])) ? filter_var($_POST["last_name"], FILTER_SANITIZE_SPECIAL_CHARS) : "";
            if (preg_match("/\d/", $_POST["last_name"])) {
                $errors[] = "Last name must not contain number!";
            }
        }
        //NOTE: Validate and sanitize email
        if (strlen($_POST["email"]) == 0) {
            $errors[] = "Pease enter your email!";
        } else {
            $sanitized_email = (isset($_POST["email"])) ? filter_var($_POST["email"], FILTER_SANITIZE_EMAIL) : "";
            if (!filter_var($sanitized_email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "{$sanitized_email} is not a valid email address";
            }
        }

        //NOTE: Validate and sanitize password
        //NOTE: Validate confirm password
        if (strlen($_POST["password"]) == 0) {
            $errors[] = "Please enter your password";
        } else {
            $sanitized_password = (isset($_POST["password"])) ? filter_var($_POST["password"], FILTER_SANITIZE_SPECIAL_CHARS) : "";
            $hashed_password = password_hash($sanitized_password, PASSWORD_BCRYPT);
            if (empty($_POST["confirm_password"])) {
                $errors[] = "Please confirm your password";
            } else if ($_POST["password"] !== $_POST["confirm_password"]) {
                $errors[] = "Password don't match!";
            }
        }

        if (!empty($errors)) {
            $_SESSION["errors"] = $errors;
            header("Location: sign_in.php");
            exit();
        } else {
            $query = "INSERT INTO users (first_name, last_name, email, password)
                        VALUES (?, ?, ?, ?)";
            $statement = $connection->prepare($query);
            $statement->bind_param("ssss", $sanitized_first_name, $sanitized_last_name, $sanitized_email, $hashed_password);
            $statement->execute();
            $statement->close();
            $_SESSION["is_logged_in"] = TRUE;
            header("Location: dashboard.php");
            exit();
        }
    }
    //NOTE: This code processes the logout submission
    if (isset($_POST["action"]) && $_POST["action"] == "logout") {
        session_destroy();
        header("Location: sign_in.php");
        exit();
    }
    //NOTE: This code processes the login submission
    if (isset($_POST["action"]) && $_POST["action"] == "submit_login") {
        if (strlen($_POST["email"]) == 0) {
            $errors[] = "Please enter your email address";
        } else {
            $sanitized_email = (isset($_POST["email"])) ? filter_var($_POST["email"], FILTER_SANITIZE_EMAIL) : "";
            if (!filter_var($sanitized_email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "{$sanitized_email} is not a valid email address";
            }
        }
        if (strlen($_POST["password"]) == 0) {
            $errors[] = "Please enter your password";
        }
        //Note: Authentication
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header("Location: log_in.php");
            exit();
        } else {
            $email = (isset($_POST["email"])) ? $_POST["email"] : "";
            $confirm_password = (isset($_POST["password"])) ? $_POST["password"] : "";

            $query = "SELECT id, first_name, last_name, password FROM users WHERE email = ?";
            $statement = $connection->prepare($query);
            $statement->bind_param("s", $email);
            $statement->execute();
            $statement->bind_result($id, $first_name, $last_name, $hashed_password);
            $statement->fetch();
            $statement->close();

            $message = [];
            if (password_verify($confirm_password, $hashed_password)) {
                //NOTE: Store the datas form the database to session variable
                $_SESSION["is_logged_in"] = TRUE;
                $_SESSION["id"] = $id;
                $_SESSION["first_name"] = $first_name;
                $_SESSION["last_name"] = $last_name;

                //NOTE: to fetch reviews
                $results = fetchReviewsAndReply();
                $_SESSION["results"] = $results;
                header("Location: dashboard.php");
                exit();
            } else {
                $message[] = "User not found!";
                $_SESSION["message"] = $message;
                header("Location: log_in.php");
                exit();
            }
        }
    }
    //NOTE: This code processes the reviews submission
    if (isset($_POST["action"]) && $_POST["action"] == "submit_review") {gi
        if (strlen($_POST["review"]) == 0) {
            $errors[] = "Please input your review";
        }
        if (!empty($errors)) {
            $_SESSION["errors"] = $errors;
            header("Location: dashboard.php");
            exit();
        } else {
            $review = (isset($_POST["review"]))  ? filter_var($_POST["review"], FILTER_SANITIZE_SPECIAL_CHARS) : "";
            $user_id = $_SESSION["id"];

            $query = "INSERT INTO reviews (user_id, content) VALUES (?, ?)";
            $statement = $connection->prepare($query);
            $statement->bind_param("is", $user_id, $review);
            $statement->execute();
            $statement->close();
            //NOTE: to fetch reviews
            $results = fetchReviewsAndReply();
            $_SESSION["results"] = $results;

            header("Location: dashboard.php");
            exit();
        }
    }
    //NOTE: This code processes the anonymous user
    if (isset($_POST["action"]) && $_POST["action"] == "submit_anonymous_user") {
        $_SESSION["is_logged_in"] = FALSE;

            $results = fetchReviewsAndReply();
            $_SESSION["results"] = $results;
        header("Location: dashboard.php");
        exit();
    }
    //NOTE: This code processes the reply submission
    if (isset($_POST["action"]) && $_POST["action"] == "user_reply") {
        $review_id = isset($_POST["review_id"]) ? $_POST["review_id"] : "";
        $user_id = isset($_SESSION["id"]) ? $_SESSION["id"] : "";
        $reply_content = isset($_POST["userReplyContent"]) ? $_POST["userReplyContent"] : "";
        // $reply_user_first_name = isset($_SESSION["first_name"]) ? $_SESSION["first_name"] : "";
        // $reply_user_first_name = isset($_SESSION["last_name"]) ? $_SESSION["last_name"] : "";
        var_dump($user_id);
        //COMMENT: Validations
        if (strlen($_POST["userReplyContent"]) == 0) {
            $errors[] = "Reply cannot be empty";
            $_SESSION["errors"] = $errors;
        }
        if (!empty($errors)) {
            header("Location: dashboard.php");
            exit();
        } else {
            $query = "INSERT INTO replies(review_id, user_id, content) VALUES (?, ?, ?)";

            $statement = $connection -> prepare($query);
            $statement -> bind_param("iis", $review_id, $user_id, $reply_content);
            $statement -> execute();
            $statement  -> close();

            //NOTE: to fetch reviews
            $results = fetchReviewsAndReply();
            $_SESSION["results"] = $results;
            header("Location: dashboard.php");
            exit();
        }
    }
} else {
    header("Location: sign_in.php");
    exit();
}

//accounts:
