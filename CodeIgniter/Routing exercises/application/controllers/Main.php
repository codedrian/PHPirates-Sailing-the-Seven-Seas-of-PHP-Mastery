<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Main extends CI_Controller
{

    public function index() {
        echo 'I am the main class!';
    }
    public function hello()
    {
        echo "Hello, World!";
    }
    public function say()
    {
        echo "HI.";
    }
    public function say_anything($message) {
        echo strtoUpper($message);
    }
    public function danger() {
        redirect('main/');
    }
}
?>
