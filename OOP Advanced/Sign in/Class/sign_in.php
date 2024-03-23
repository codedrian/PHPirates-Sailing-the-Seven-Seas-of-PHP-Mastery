<?php
require_once("connection.php");
class UserAuthenticator {
    private $first_name;
    private $last_name;
    private $password;
    function __construct($first_name, $last_name, $password) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->password = $password;
    }
    function inputChecker() {
        if (empty($this->first_name)) {
            $errors[] = "Please enter your first name";
        } else if (preg_match("/\d/", $this->first_name)) {
            $errors[] = "Name shouldn't contain numbers";
        } else {
            $_SESSION["first_name"] = $this->first_name;
        }
        if (empty($this->last_name)) {
            $errors[] =  "Please enter your last name";
        } else if (preg_match("/\d/", $this->last_name)) {
            $errors[] = "Name shouldn't contain numbers";
        } else {
            $_SESSION["last_name"] = $this->last_name;
        }
        if (!empty($this->password)) {
            $_SESSION["password"] = $this->password;
        } else {
            $errors[] =  "Please enter your password";
        }
        if (!empty($errors)) {
            $_SESSION["errors"] = $errors;
            return false;
        }
        return $this;
    }
    function sanitizeInput() {
        $this->first_name = filter_var($this->first_name, FILTER_SANITIZE_SPECIAL_CHARS);
        $this->last_name = filter_var($this->last_name, FILTER_SANITIZE_SPECIAL_CHARS);
        $this->password = filter_var($this->password, FILTER_SANITIZE_SPECIAL_CHARS);
        return $this;
    }

    function addToDatabase($connection) {
        $query = "INSERT INTO users (first_name, last_name, password) VALUES (?, ?, ?)";
        $statement = $connection->prepare($query);
        $statement->bind_param("sss", $this->first_name, $this->last_name, $this->password);
        $statement->execute();
        $statement->close();
        return true;
    }
}
