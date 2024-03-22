<?php

class HTML_Generator
{
    private $name;
    private $price;
    private $stock;


    public function render_input($arr)
    {
        $this->name = $arr['name'] ?? null;
        $this->price = $arr['price'] ?? null;
        $this->stock = $arr['stock'] ?? null;
        echo "<form>";
        echo "<label for='name'>Name</label>";
        echo "<input type='text' name='name' value='{$this->name}'>";

        echo "<label for='price'>Price</label>";
        echo "<input type='text' name='price' value='{$this->price}'>";

        echo "<label for='stock'>Stock</label>";
        echo "<input type='text' name='stock' value='{$this->stock}'>";

        echo "</form>";
    }
    public function render_list($arr, $prefferedList)
    {
        if ($prefferedList == "ordered-list") {
            echo"<ol>";
            foreach ($arr as $value) {
                echo "<li>$value</li>";
            }
            echo "</ol>";
        }
        if ($prefferedList == "unordered-list") {
            echo "<ul>";
            foreach ($arr as $value) {
                echo "<li>$value</li>";
            }
            echo "</ul>";
        }
        return $this;
    }
}
$form1 = new HTML_Generator();
$myCart = [
    "name" => "Bag",
    "price" => 500,
    "stock" => 10
];
$fruits = ["Apple", "Banana", "Cherry"];
$form1->render_list($fruits, "unordered-list")->render_input($myCart);
