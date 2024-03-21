<?php
class User
{
    private $username;
    private $email;
    private $password;

    public function __get($property) {
        if(property_exists($this, $property)) {
            return $this->$property;
        }
    }
    public function __set($property, $value) {
        if ($property == "username") {
            $this->username = strtolower($value);
        } else if ($property == "email") {
            if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $this->email = $value;
            } else {
                echo "Invalid";
            }
        }
    }
}

$user = new User();
$user->username = "JohnDoe"; 
$user->email = "john@example.com"; // Valid email format


echo $user->username ." ";
echo $user->email;

?>
